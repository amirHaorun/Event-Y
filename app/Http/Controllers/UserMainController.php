<?php

namespace App\Http\Controllers;

use App\about;
use App\categories;
use App\events;
use App\HotEvents;
use App\ShoppingCart;
use App\tickets;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = events::PublishedEvents()->get();
        $categories = categories::all();
        return view('home.main',compact('events','categories'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event_id)
    {
        //
        $event = events::with('category:name,id','tickets')->findOrFail($event_id);
        $categories = categories::all();
        return view('home.event',compact('event','categories'));
    }
    public function about_page()
    {
        $categories = categories::all();
        $about = about::findOrFail(1);
        return view('home.about_page',compact('categories','about'));

    }

    public function show_categ_events($id)
    {
        $categories = categories::all();
        $events = events::with('shows','category')->PublishedEvents()->where('categ_id',$id)->get();
        return view('home.category',compact('events','categories'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
