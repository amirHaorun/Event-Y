<?php

namespace App\Http\Controllers;

use App\events;
use App\Http\Requests\StoreShow;
use App\shows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminShowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth_user = Auth::User();
        $shows = shows::with('event:id,name')->orderByDesc('created_at','DESC')->get();
        $events = events::orderByDesc('created_at','DESC')->get();
        return view('admin.shows.index',compact('auth_user','shows','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShow $request)
    {
        $request->starting_time = date('h:i A', strtotime($request->starting_time));
        $request->ending_time = date('h:i A', strtotime($request->ending_time));

        $show = new shows();

        $show->event_id = $request->event_id;
        $show->day = $request->day;
        $show->starting_time = $request->starting_time;
        $show->ending_time = $request->ending_time;

        $show->save();

        $request->session()->flash('alert-success', 'Shows was successful added!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $auth_user = Auth::User();

        $event = events::FindOrFail($id);

        $shows = $event->shows()->get();
        return view('admin.shows.event-shows',compact('event','shows','auth_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreShow $request, $id)
    {
        $show = shows::FindOrFail($id);

        $request->starting_time = date('h:i A', strtotime($request->starting_time));
        $request->ending_time = date('h:i A', strtotime($request->ending_time));

        $show->event_id = $request->event_id;
        $show->starting_time = $request->starting_time;
        $show->ending_time = $request->ending_time;
        $show->day = $request->day;
        $show->save();
        $request->session()->flash('edit-success', 'Show was Edited Successfully!');

        return back();
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
        shows::destroy($id);
        session()->flash('delete-success', 'Show was Deleted Successfully!');
        return back();
    }
}
