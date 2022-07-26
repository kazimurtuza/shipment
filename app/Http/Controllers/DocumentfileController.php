<?php

namespace App\Http\Controllers;

use App\Models\shipment;
use Illuminate\Http\Request;

class DocumentfileController extends Controller
{
    public function upload_document(Request $request){

        try {
            $invoice_no=shipment::find($request->shipment_id)->invoice_no;
    
    
            $file_upload_path = 'uploads/Inv-No-'.$invoice_no;
    
            if($request->bill_of_lading) {
                $bill_of_lading_name = 'Bill_of_Lading_id'.$request->shipment_id.'.'. $request->bill_of_lading->extension();
                $request->bill_of_lading->move($file_upload_path, $bill_of_lading_name);
                $bill_of_lading_path = $file_upload_path . '/' . $bill_of_lading_name;
    
                $upload_info=shipment::where('id',$request->shipment_id)->update(['bill_of_lading'=>$bill_of_lading_path]);
    
            }
    
    
            if($request->proof_of_delivery) {
                $proof_of_delivery_name ='Proof_of_Delivery_id'.$request->shipment_id.'.'. $request->proof_of_delivery->extension();
                $request->proof_of_delivery->move($file_upload_path, $proof_of_delivery_name);
                $proof_of_delivery_path = $file_upload_path . '/' . $proof_of_delivery_name;
    
                $upload_info=shipment::where('id',$request->shipment_id)->update(['proof_of_delivery'=>$proof_of_delivery_path]);
    
    
            }
        } catch(\Exception $exception) {
            dd($exception->getMessage());
        }


          
              return redirect()->back()->with('success', 'Successfully  Documents Uploaded');

          


    }
}
