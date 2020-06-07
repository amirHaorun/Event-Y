<?php

namespace App\Http\Controllers;

use App\categories;
use App\Purchases;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserPurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = categories::all();
        $purchases = Purchases::with('ticket.event:id,name,venue','show')
            ->where('user_id',Auth::id())->orderBy('created_at','DESC')->get();

        return view('home.purchases',compact('categories','purchases'));
    }

    public function edit($id)
    {
        $purchase = Purchases::findorFail($id);
        $purchase->status = "cancel request";
        $purchase->save();
        return  back();
    }

    public function cancellation_request($purchase_id)
        {
            $purhcase = Purchases::findOrFail($purchase_id);
            $purhcase->status = "cancel request";
            $purhcase->save();
            return back();
        }

}
