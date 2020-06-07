<?php

namespace App\Http\Controllers;

use App\categories;
use App\Purchases;
use App\ShoppingCart;
use App\tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCartController extends Controller
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
         $shoppingCart = ShoppingCart::with('ticketsInCart.event.shows')->where('user_id',Auth::id())->first();

        return view('home.cart',compact('categories','shoppingCart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ConfirmPurchase(Request $request)
    {

       $result =  DB::table('cart_ticket')->where('id', $request->cart_ticket_id)->first();

        $purchase = new Purchases();
        $purchase->user_id =Auth::id();
        $purchase->ticket_id = $result->ticket_id;
        $purchase->show_id = $result->show_id;
        $purchase->quantity = $result->quantity;
        $purchase->status = "PENDING";
        $purchase->value = $result->value;
        $purchase->created_at = Carbon::today();
        $purchase->updated_at = Carbon::today();
        $purchase->save();

        $result =  DB::table('cart_ticket')->where('id', $request->cart_ticket_id)->delete();
        tickets::findOrFail($purchase->ticket_id)->available_tickets -=1;
        tickets::findOrFail($purchase->ticket_id)->sold_tickets +=1;
        return redirect('/purchase');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        //
        $value =  tickets::findOrFail($request->ticket_id)->price * $request->quantity ;
        Auth::user()->cart->ticketsInCart()->attach(
            ['ticket_id'=>$request->ticket_id],
            [
                'show_id'=>$request->show_id,'quantity'=>$request->quantity,'status'=>"unconfirmed"
                ,'value'=> $value,'created_at'=>Carbon::today(),'updated_at'=>Carbon::today(),
            ]);
        Auth::user()->cart->save();

        return redirect('/cart');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::update('update cart_ticket set status = ? where id = ?', [ "Canceled in Cart" , $id]);
        session()->flash('delete-success', 'Ticket Was Deleted Successfully!');

     return back();
    }
}
