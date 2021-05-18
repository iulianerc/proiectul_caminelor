<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\SystemVariableBook\SystemVariableBook;
use App\Repositories\GeneratePDF\GeneratePDFRepository;

class GeneratePDFController extends Controller
{
    protected GeneratePDFRepository $repository;

    public function __construct (GeneratePDFRepository $repository)
    {
        $this->repository = $repository;
    }

    public function mainSheet (Order $order)
    {

        $data = array_merge(
            $this->repository->getGeneralData($order),
            $this->repository->getAdditionalMainSheetData($order)
        );
        $this->repository->generatePdf('mainSheet', $data, true);
    }

//  ------------------------------------------------------  -----------
    public function generalList (Order $order): void
    {
        $data = $this->repository->getGeneralListData($order);
        $this->repository->generatePdf('generalList', $data);
    }

//  ------------------------------------------------------  -----------
    public function generalListContinuation (Order $order): void
    {
        $data = $this->repository->getAnexData($order);
        $this->repository->generatePdf('generalListContinuation', $data);
    }

//  ------------------------------------------------------  -----------
    public function rules (): void
    {
        $this->repository->generatePdf('rules', [], true);

    }

//  ------------------------------------------------------  -----------
    public function guarantee (Order $order): void
    {
        $lang = $order->language;
        $data = [
            'AUTHORISED_ISSUING_PERSON' => SystemVariableBook::where('alias', 'SYSTEM_NAME')->first()->{"value_$lang"},
            'SYSTEM_ADDRESS'            => SystemVariableBook::where('alias', 'SYSTEM_ADDRESS')->first()->{"value_$lang"},
            'SYSTEM_PHONES'             => SystemVariableBook::where('alias', 'SYSTEM_PHONES')->first()->{"value_$lang"},
            'SYSTEM_EMAIL'              => SystemVariableBook::where('alias', 'SYSTEM_EMAIL')->first()->{"value_$lang"}
        ];
        $this->repository->generatePdf('guarantee', $data);

    }
//  ------------------------------------------------------  -----------
//                              Vouchers
    public function importVoucher (Order $order)
    {
        $data = array_merge(
            $this->repository->getGeneralData($order),
            $this->repository->getVouchersData($order)
        );
        $pdf = $this->repository->mergeVoucher('importVoucher', $data);

        return response($pdf)->header('Content-type', 'application/pdf');
    }
//  ------------------------------------------------------  -----------
    public function exportVoucher (Order $order)
    {
        $data = array_merge(
            $this->repository->getGeneralData($order),
            $this->repository->getVouchersData($order)
        );
        $pdf = $this->repository->mergeVoucher('exportVoucher', $data);

        return response($pdf)->header('Content-type', 'application/pdf');
    }
//  ------------------------------------------------------  -----------
    public function reimportVoucher (Order $order)
    {
         $data = array_merge(
            $this->repository->getGeneralData($order),
            $this->repository->getVouchersData($order)
        );

        $pdf = $this->repository->mergeVoucher('reimportVoucher', $data);

        return response($pdf)->header('Content-type', 'application/pdf');
    }
//  ------------------------------------------------------  -----------
    public function reexportVoucher (Order $order)
    {
         $data = array_merge(
            $this->repository->getGeneralData($order),
            $this->repository->getVouchersData($order)
        );

        $pdf = $this->repository->mergeVoucher('reexportVoucher', $data);

        return response($pdf)->header('Content-type', 'application/pdf');
    }
//  ------------------------------------------------------  -----------
    public function transitVoucher (Order $order)
    {
         $data = array_merge(
            $this->repository->getGeneralData($order),
            $this->repository->getVouchersData($order)
        );

        $this->repository->generatePdf('transitVoucher', $data);
    }
//  ------------------------------------------------------  -----------
//                                   Talons

    public function exportReimportTalon (Order $order)
    {
        $data = $this->repository->getTalonsData($order);
        $pdf = $this->repository->mergeTalons('exportReimportTalon', $data);

        return response($pdf)->header('Content-type', 'application/pdf');
    }

    public function importReexportTalon (Order $order)
    {
        $data = $this->repository->getTalonsData($order);
        $pdf = $this->repository->mergeTalons('importReexportTalon', $data);

        return response($pdf)->header('Content-type', 'application/pdf');
    }

    public function transitTalon (Order $order)
    {
        $data = $this->repository->getTalonsData($order);
        $this->repository->generatePdf('transitTalon', $data);
    }
//  ------------------------------------------------------  -----------
//                                  Full Pdf

//    public function FullPdf (
//        Order $order,
//        Merger $merger
//    )
//    {
//        $merger->addRaw($this->repository->generatePdf('mainSheet', $mainSheet->data, true, true));
//        $merger->addRaw($this->repository->generatePdf('generalList', $generalList->data, false, true));
//
//        $merger->addRaw($this->repository->generatePdf('exportReimportTalon', [], false, true));
//        $merger->addRaw($this->repository->generatePdf('importReexportTalon', [], false, true));
//        $merger->addRaw($this->repository->generatePdf('transitTalon', [], false, true));
//
//        $merger->addRaw($this->repository->generatePdf('exportVoucher', $exportVoucher->data, false, true));
//        $merger->addRaw($this->repository->generatePdf('importVoucher', $importVoucher->data, false, true));
//        $merger->addRaw($this->repository->generatePdf('reexportVoucher', $reexportVoucher->data, false, true));
//        $merger->addRaw($this->repository->generatePdf('reimportVoucher', $reimportVoucher->data, false, true));
//        $merger->addRaw($this->repository->generatePdf('transitVoucher', $transitVoucher->data, false, true));
//        $merger->addRaw($this->repository->generatePdf('rules', [], true, true));
//        $merger->addRaw($this->repository->generatePdf('guarantee', $guarantee->data, false, true));
//        return response($merger->merge())->header('Content-type', 'application/pdf');
//    }
}
