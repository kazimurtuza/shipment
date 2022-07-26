<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\customer_agent;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customer_list=customer::where('status',1)->orderBy('id', 'DESC')->get();
        return view('Customer.index',['customer_list'=>$customer_list]);
    }

    public function insert_customer(Request $request){


        $validatedData = $request->validate([
            'company_name' => 'required|max:255',
            'customer_type' => 'required|max:255',
            'mc_number' => 'required|max:255',
            'tracking_email' => 'required|email',
            'process_type' => 'required',

        ]);

        $data=new customer();
        $data->company_name=$request->company_name;
        $data->customer_type=$request->customer_type;
        $data->mc_number=$request->mc_number;
        $data->tracking_email=$request->tracking_email;
        $data->process_type=$request->process_type;
        if(($request->process_type==3)&&$request->acccount_email){
            $data->accounting_email=$request->acccount_email;
        }
        if($request->process_type==2){
            $data->pay_percent=$request->pay_percent;
            $data->accounting_email=$request->acccount_email2;
        }
        if($request->edit==0){
            if(empty($request->agent_name)||empty($request->agent_email)){
                return redirect()->back()->with('error', 'Customer contact agent name and agent email is required');
            }
           $customer_id= $data->save();
            foreach ( $request->agent_name as $key=>$agent){
                $agentname= $request->agent_name[$key];
                $agentagent_email= $request->agent_email[$key];



                $customer= new customer_agent();
                $customer['agent']=$agentname;
                $customer['agent_email']=$agentagent_email;
                $customer['customer_id']=$data->id;
                $customer->save();

            }
            return redirect()->back()->with('success', 'Successfully Saved a New Customer');

      }else if($request->edit==1){
            $data->exists = true;
            $data->id = $request->id;
            $data->save();
            return redirect()->back()->with('success', 'Successfully updated customer');

        }

    }

    public function customer_agentlist(Request $request){
        $customer_id= $request->data_id;

        $agentlist=customer_agent::where('customer_id',$customer_id)->get();
        return $agentlist;
    }

    public function agent_add(Request $request){
        $customer= new customer_agent();
        $customer['agent']=$request->agent_name;
        $customer['agent_email']=$request->agent_email;
        $customer['customer_id']=$request->customer_id;
        $customer->save();

       return customer_agent::where('customer_id',$request->customer_id)->get();

    }
}
