<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MapHelperController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\DeliverytimeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ShipmentOverviewController;
use App\Http\Controllers\DocumentfileController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FilezipController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Middleware\RoleCheck;


use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('map', function () {
    return view('phonemap');
});

Route::get('/', function () {

    return view('welcome');
})->middleware('guest');

Route::get('login', function () {
    return view('welcome');
})->name('login')->middleware('guest');
/////login////
Route::post('/customLogin', [CustomAuthController::class, 'customLogin'])->name('customLogin');

/// reset password//
Route::get('/reset_pass_view', [ResetPasswordController::class, 'reset_pass_view'])->name('reset_pass_view');
Route::post('/submitForgetPasswordForm', [ResetPasswordController::class, 'submitForgetPasswordForm'])->name('submitForgetPasswordForm');
Route::get('/send_reset_mail', [ResetPasswordController::class, 'send_reset_mail'])->name('send_reset_mail');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('submitResetPasswordForm', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('submitResetPasswordForm');


Route::group(['middleware' => 'auth'], function () {

////Registration/////
    Route::post('/registration', [CustomAuthController::class, 'registration'])->name('registration');

///// signOut ///////
    Route::get('/signOut', [CustomAuthController::class, 'signOut'])->name('signOut');


// shipment//
    Route::get('/shipment_summary', [ShipmentController::class, 'index'])->name('shipment_summary');
    Route::post('/insert_shipment', [ShipmentController::class, 'insert_shipment'])->name('insert_shipment');


//end shipment//

// Customer//
    Route::get('/customer_view', [CustomerController::class, 'index'])->name('customer_view');
    Route::post('/insert_customer', [CustomerController::class, 'insert_customer'])->name('insert_customer');
    Route::get('/customer_agentlist', [CustomerController::class, 'customer_agentlist'])->name('customer_agentlist');
    Route::post('/agent_add', [CustomerController::class, 'agent_add'])->name('agent_add');
// shipment//

// Drive//
    Route::get('/driver_view', [DriverController::class, 'index'])->name('driver_view');
    Route::post('/insert_driver', [DriverController::class, 'insert_driver'])->name('insert_driver');
    Route::post('driver_profit_percentage_update', [DriverController::class, 'driver_profit_percentage_update'])->name('driver_profit_percentage_update');
// Drive//

// Expense//
    Route::get('/expense_view', [ExpenseController::class, 'index'])->name('expense_view');
    Route::post('/expense_edit', [ExpenseController::class, 'expense_edit'])->name('expense_edit');
    Route::post('actual_expense_insert', [ExpenseController::class, 'actual_expense_insert'])->name('actual_expense_insert');


// Expense//expense_edit

//  -----------invoice--------------

    Route::post('stor_invoice', [InvoiceController::class, 'stor_invoice'])->name('stor_invoice');
    Route::get('deleteinvlist', [InvoiceController::class, 'deleteinvlist'])->name('deleteinvlist');

    Route::get('makeaspaid/{id}', [ShipmentController::class, 'makeaspaid'])->name('makeaspaid');
    Route::get('getinvoicedetails', [ShipmentController::class, 'getinvoicedetails']);
    //  -----------invoice------------


//map distance//
    Route::post('map-distance', [MapHelperController::class, 'getDistance'])->name('map.get-distance');
//map distance//

/// // get Expected  Delivery date time  //
    Route::post('delivery_time_find', [DeliverytimeController::class, 'get_delivery_time'])->name('delivery_time');
    Route::post('get_estimate_report_arr', [ShipmentOverviewController::class, 'get_estimate_report_arr'])->name('get_estimate_report_arr');
    Route::post('upload_document', [DocumentfileController::class, 'upload_document'])->name('upload_document');
//get Expected  Delivery date time


    Route::get('weeklyfinancesrc', [\App\Http\Controllers\FinanceController::class, 'weeklyfinancesrc'])->name('weeklyfinancesrc');
    Route::get('monthlylyfinancesrc', [\App\Http\Controllers\FinanceController::class, 'monthlylyfinancesrc'])->name('monthlylyfinancesrc');
    Route::get('datetodatefinance_src', [\App\Http\Controllers\FinanceController::class, 'datetodatefinance_src'])->name('datetodatefinance_src');
////alert info///
    Route::post('alert_info_insert', [AlertController::class, 'alert_info_insert'])->name('alert_info_insert');

    ////User///
    Route::middleware([RoleCheck::class])->group(function () {
        Route::get('registration_view', [CustomAuthController::class, 'registration_view'])->name('registration_view');
        Route::post('registration_insert', [CustomAuthController::class, 'registration'])->name('registration_insert');
        Route::post('edit_user', [UserController::class, 'edit_user'])->name('edit_user');
        Route::get('delete_user/{id}', [UserController::class, 'delete_user']);
    });


//    downoadzip File

    Route::get('downloadzipfile/{id}', [FilezipController::class, 'downloadZip']);
    Route::get('downloadallfile', [FilezipController::class, 'downloadallfile'])->name('downloadallfile');
    Route::post('download_view_file', [FilezipController::class, 'download_view_file'])->name('download_view_file');

//    export shipment
    Route::get('shipment_export/{start}/{end}', [ExportController::class, 'shipment_export']);

    Route::post('shipmentfilter', [ShipmentController::class, 'shipmentfilter'])->name('shipmentfilter');

    Route::get('src_shipment_list', [ShipmentController::class, 'src_shipment_list'])->name('src_shipment_list');
    Route::get('src_shipment_weekly', [ShipmentController::class, 'src_shipment_weekly'])->name('src_shipment_weekly');

//    driver_update_for_shipment

    Route::post('driver_update_for_shipment', [ShipmentController::class, 'driver_update_for_shipment'])->name('driver_update_for_shipment');

    // get driver payment

    Route::post('get_driver_payment', [ShipmentController::class, 'get_driver_payment'])->name('get_driver_payment');


    // get finance

    Route::get('finance', [\App\Http\Controllers\FinanceController::class, 'index'])->name('finance');


    // phone

//  shipment invoice send

    Route::post('sendinvoice', [ShipmentController::class, 'sendinvoice'])->name('sendinvoice');

//    shipment cancel
    Route::post('shipment_cancel', [ShipmentController::class, 'shipment_cancel'])->name('shipment_cancel');
    Route::get('shipmentlistdata', [ShipmentController::class, 'shipmentlistdata'])->name('shipmentlistdata');


//pdf show
    Route::get('/pdf/{file}', function ($file) {
//        dd($file);
        // file path
        $file_path = 'uploads/Inv-No-1084/invoice.pdf';

        $path = public_path('../../' . $file_path);
        // header
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $file . '"'
        ];
        return response()->file($path, $header);
    })->name('pdf');
//pdf show


//twilio sms
    Route::get('sms', function () {

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");

        $client = new \Twilio\Rest\Client($account_sid, $auth_token);

        $recipients = '+8801792976019';
        $client->messages->create($recipients,
            ['from' => $twilio_number, 'body' => 'twilio sms']);
    });

});

//with out login phone
//    Route::get('phone',[\App\Http\Controllers\FinanceController::class,'phoneindex'])->name('phone');
Route::get('pickupsuccess_mess', [\App\Http\Controllers\FinanceController::class, 'success'])->name('pickupsuccess_mess');

Route::get('shipment_pickup_start/{shipment_id}', [\App\Http\Controllers\FinanceController::class, 'phoneindex'])->name('shipment_pickup_start');
Route::get('shipment_delivery_info_set/{shipment_id}', [\App\Http\Controllers\FinanceController::class, 'shipment_delivery_info_set'])->name('shipment_delivery_info_set');
Route::post('updatepickup_from_phone', [ShipmentController::class, 'updatepickup_from_phone'])->name('updatepickup_from_phone');
Route::post('updatedelivery_from_phone', [ShipmentController::class, 'updatedelivery_from_phone'])->name('updatedelivery_from_phone');
Route::get('mapnavigate/{shipment_id}', [ShipmentController::class, 'mapnavigate']);
//phone


