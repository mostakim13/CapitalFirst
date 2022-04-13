<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paymentmethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function paymentMethod()
    {
        $paymentMethods = Paymentmethod::all();
        return view('admin.paymentMethod.payment-method', compact('paymentMethods'));
    }

    public function paymentMethodStore(Request $request)
    {
        $paymentMethods = new Paymentmethod;
        $paymentMethods->name = $request->name;
        $paymentMethods->account_name = $request->account_name;
        $paymentMethods->wallet_id = $request->wallet_id;
        $paymentMethods->status = $request->status;
        $paymentMethods->save();
        $notification = array(
            'message' => 'Payment Method Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function paymentMethodUpdate(Request $request)
    {
        $paymentMethods = Paymentmethod::find($request->id);
        $paymentMethods->name = $request->name;
        $paymentMethods->account_name = $request->account_name;
        $paymentMethods->wallet_id = $request->wallet_id;
        $paymentMethods->status = $request->status;
        $paymentMethods->save();
        $notification = array(
            'message' => 'Payment Method Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        Paymentmethod::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Payment record has been deleted successfully!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}