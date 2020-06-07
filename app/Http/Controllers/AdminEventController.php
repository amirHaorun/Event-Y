<?php

namespace App\Http\Controllers;
use App\categories;
use App\events;
use App\Http\Requests\StoreEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AdminEventController extends Controller
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
        $events = events::with('category:name,id')->orderByDesc('id')->paginate(20);
        return view('admin.event.index',compact('auth_user','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $auth_user = Auth::User();
        $categs= categories::all();
        return view('admin.event.create',compact('auth_user','categs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent $request)
    {
        // event create
        $input = $request->all();


         $input['photo'] = request('photo')->store('photos');

         \App\events::create($input);
        $request->session()->flash('alert-success', 'Event was successful added!');
       return redirect(route('events.main'));
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
        $auth_user = Auth::User();
        $event = events::with('category:id,name')->findOrFail($id);
        $categs = categories::all();

        return view('admin.event.edit',compact('categs','event','auth_user'));
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
        $event = events::findOrFail($id);
        if(!request()->file('photo')) $request['photo'] = $event->photo;
        //if there's delete the old one first then save the new one
        else {
            // checking if the last image was a real image if it was real image and exists in file delete it
            // if its not real image , There's no need to delete any last image
            if(!file_exists(public_path().'/storage'.$event->photo)) {
                unlink('storage/' . $event->photo);
            }
            $input['photo'] = request('photo')->store('photos');

        }
        $event->update($input);
        $request->session()->flash('edit-success', 'Event was Edited Successfully!');

        return redirect(route('events.main'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        events::findOrFail($id)->delete();
        session()->flash('delete-success', 'Event was Deleted Successfully!');
        return back();
    }

}
