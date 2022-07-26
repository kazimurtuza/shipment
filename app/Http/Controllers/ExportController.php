<?php

namespace App\Http\Controllers;


use App\Exports\shipmentExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function shipment_export($start,$end)
    {

        return Excel::download(new shipmentExport($start,$end), 'shipment.xlsx');
    }
}
