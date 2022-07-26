<?php

namespace App\Http\Controllers;

use App\Models\expense;
use App\Models\shipment;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function index(){
       $exdata= expense::first();
        return view('Expenses.index',['expense'=>$exdata]);
    }

    public function actual_expense_insert(Request $request){

        $data=shipment::where('id',$request->shipment_id)->update(['actual_rent'=>$request->rent,
            'actual_insurance'=>$request->actual_insurance,
            'actual_gas'=>$request->actual_gas_price,
            'actual_dispatch'=>$request->actual_dispatch_price,
            'actual_factoring'=>$request->actual_factoring_price,]);

        if($data){
            return redirect()->back()->with('success', 'Successfully Updated Actual Shipment Cost');
        }


    }

    public function expense_edit(Request $request){

        $validatedData = $request->validate([
            'truck_per_day' => 'numeric',
            'insurance_per_day' => 'numeric',
            'per_gallon_gas_price' => 'numeric',
            'factoring_bid_percentage' => 'numeric',
            'dispatch_bid_percentage' => 'numeric',
            'truck_per_mile_cost' => 'numeric',

        ]);

        $data=expense::first()->update(['truck_per_day'=>$request->truck_per_day,'insurance_per_day'=>$request->insurance_per_day,'per_gallon_gas_price'=>$request->per_gallon_gas_price,'truck_per_mile_cost'=>$request->truck_per_mile_cost,'dispatch_bid_percentage'=>$request->dispatch_bid_percentage,'factoring_bid_percentage'=>$request->factoring_bid_percentage]);

        if($data){
            return redirect()->back()->with('success', 'Successfully Updated Expense');
        }

    }

}
