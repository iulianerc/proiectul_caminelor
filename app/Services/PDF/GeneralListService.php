<?php


namespace App\Services\PDF;


use App\Models\Order\Order;
use Illuminate\Support\Collection;
use NumberToWords\NumberToWords;

class GeneralListService
{
    private Order $order;

    private Collection $firstPageItems;

    private Collection $paginatedAnexItems;

    private int $onFirstPage = 30;

    private int $onAnexPages = 31;


    public function __construct ($order)
    {
        $this->order = $order;

        $items = $order->goods->map(fn($item, $id) => [
            'id'       => $id,
            'name'     => $item->name,
            'quantity' => $item->quantity,
            'weight'   => $item->size,
            'value'    => $item->price,
            'origin'   => $item->originalCountry->code,
        ]);

        $this->firstPageItems = $items->take($this->onFirstPage);
        $anexItems = $items->splice($this->onFirstPage)->chunk($this->onAnexPages);
        $this->paginatedAnexItems = $anexItems->count() % 2 ? $anexItems->push(collect([])) : $anexItems;
    }

    public static function make ($order): GeneralListService
    {
        return new static($order);
    }

    public function getAnexPages (): array
    {
        $prevTotals = $this->getTotals(
            $this->getFirstPageItems()
        );
        return $this->paginatedAnexItems->map(function ($itemsCollection) use (&$prevTotals) {
            $items = $itemsCollection->toArray();
            $totals = $this->getTotals($items, $prevTotals);
            $page = [
                'items'      => $items,
                'prevTotals' => $prevTotals,
                'totals'     => $totals,
                'toExtend'   => $this->onAnexPages - $itemsCollection->count()
            ];
            $prevTotals = $totals;

            return $page;
        })->toArray();
    }

    public function getAnexPagesCount (): int
    {
        return $this->paginatedAnexItems->count();
    }

    public function getFirstPageItems (): array
    {
        return $this->firstPageItems->toArray();
    }

    public function getFirstPageExtending (): int
    {
        return $this->onFirstPage - $this->firstPageItems->count();
    }

    public function getTotals ($items, $prevTotals = [
        'pieces' => 0,
        'weight' => 0,
        'value'  => 0
    ]): array
    {
        $pieces = array_reduce($items, function ($acc, $item) {
            return $acc + (float)$item['quantity'];
        });
        $weight = array_reduce($items, function ($acc, $item) {
            return $acc + (float)$item['weight'];
        });
        $value = array_reduce($items, function ($acc, $item) {
            return $acc + (float)$item['value'];
        });

        return [
            'pieces' => $pieces + $prevTotals['pieces'],
            'weight' => $weight + $prevTotals['weight'],
            'value'  => $value + $prevTotals['value']
        ];
    }

    public function getWordEquivalent ($number, $locale = 'en'): string
    {
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer($locale);

        return $numberTransformer->toWords($number);
    }
}
