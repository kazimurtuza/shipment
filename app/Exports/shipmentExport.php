<?php

namespace App\Exports;

use App\Models\shipment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class shipmentExport implements FromCollection,WithHeadings,WithMapping,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $start_date;
    public $end_date;

    public function __construct($start,$end)
    {
        $this->start_date=$start;
        $this->end_date=$end;
    }
    public function collection()
    {

        $start=date('Y-m-d',$this->start_date);
        $end=date('Y-m-d',$this->end_date);
        return shipment::where('status',1)->whereBetween('pickup_date', [$start, $end])->get();

    }


    public function map($data): array
    {


        if(($data->actual_rent>0)&&($data->actual_insurance>0)&&($data->actual_gas>0)){
            $actual_gross_ex=$data->actual_rent+$data->actual_insurance+$data->actual_gas+$data->actual_dispatch+$data->actual_factoring;
            $bid=$data->bid_price;
            $grossprofit=$bid-$actual_gross_ex;
            $driver_pay=($grossprofit*$data->getdriver->profit_percentage)/100;
            $acex=$actual_gross_ex+$driver_pay;
            if($acex<=0){$acex;$driver_pay='';}

            $actual_info=['expense'=>$acex,'driver'=>$driver_pay];
        }
        else{
            $actual_info=['expense'=>'','driver'=>''];
        }


        $form_to='Form :'.$data->form.' To :'. $data->to;
        $distance=getmile_with_ex($data->distance);
        $delivery_time=$data->actual_delivery_date?'date:'.$data->actual_delivery_date.' Time:'.$data->actual_delivery_time : 'Submit Time';
        return [
            $data->pickup_date,
            $form_to,
            $delivery_time,
            $data->getdriver->driver_name,
            $distance,
            $data->bid_price,
            $actual_info['expense'],
            $data->actual_gas,
            $actual_info['driver'],
        ];
    }

    public function headings(): array
    {
        return [
       'PICKUP',
       'ORIGIN',
       'DELIVERY',
       'DRIVER',
       'MILES',
       'BID',
       'EXPENSE',
       'Gas',
       '$Driver',
        ];
    }

    public function registerEvents(): array
    {
        return [

            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:I1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFA500');
            },

        ];
    }
}
