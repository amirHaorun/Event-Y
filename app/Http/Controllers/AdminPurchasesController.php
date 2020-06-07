<?php

namespace App\Http\Controllers;

use App\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPurchasesController extends Controller
{
    //

    public function index()
    {
        $auth_user = Auth::user();
         $purchases  = Purchases::with('user:id,full_name','ticket.event:id,name')->get();
         return view('admin.purchases.index',compact('auth_user','purchases'));
    }
    public function status($purchase_id,$status)
    {
        $purchase = Purchases::findOrFail($purchase_id);
        $purchase->status = $status;
        $purchase->save();
        return back();
    }
}
