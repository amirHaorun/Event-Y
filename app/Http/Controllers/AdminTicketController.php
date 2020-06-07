<?php

namespace App\Http\Controllers;
use App\categories;
use App\events;
use App\Http\Requests\StoreTicket;
use App\tickets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
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
        $events = events::publishedevents()->orderBy('created_at','DESC')->paginate(20);
        $tickets = tickets::with('event:name,id')->paginate(20);
        return view('admin.tickets.index',compact('events','tickets','auth_user')   );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket $request)
    {
        //
        tickets::create($request->all());


        $request->session()->flash('alert-success', 'Ticket was successful added!');

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
        //get all tickets that linked to this event id

        $event  = events::with('tickets')->findOrFail($id);

        $auth_user = Auth::User();
        return view('admin.tickets.event-tickets',compact('event','auth_user'));
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
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $ticket = tickets::findOrFail($id);
        $ticket->update($input);

        $request->session()->flash('edit-success', 'Ticket was Edited Successfully!');
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
        $ticket = tickets::findOrFail($id);
        $ticket->delete();

        session()->flash('delete-success', 'Ticket was Deleted Successfully!');
        return back();

    }
}
