<?php


namespace App\Models\PDF;


use Illuminate\Database\Eloquent\Model;

class ReimportFlap extends Model
{
    public array $data = [
        'lang' => 'ru',
        'type' => [
            'ro' => 'reimport',
            'en' => 'reimportation'
        ],
        'holder' => [
            'id' => 'ф/к 100260000038282',
            'name' => '"MIC-TAN" S.R.L.'
        ],
        'address' => 'МД-2072, ул.Индепегденцей, 44, оф.34,<br> мун.Кишинэу, Республика Молдова',
        'representedBy' => [
            'name' => 'Costin Petru',
            'phone' => '0990712021045',
            'all' => [
                'en' => 'All authorized persons',
                'ro' => 'Toate persoanele autorizate',
                'ru' => 'Все уполномоченные лица'
            ]
        ],
        'issuedBy' => 'Торгово-Промышленная Палата Республики Молдова МД-2004, Г. Кишинэу, бул. Штефан чел Маре, 151, Республика Молдова',
        'usage' => 'Контейнеры, поддоны, упаковки, образцы и другие грузы, ввозимые в рамках торговой операции (вывов баллонов для заправки поверочными газовыми смесям)',
        'validUntil' => [
            'year' => '2022',
            'month' => '02',
            'day' => '08'
        ],
        'transport' => [
            'name' => 'СКХ',
            'count' => 774
        ],
        'packagingDetails' => '',
    ];
}
