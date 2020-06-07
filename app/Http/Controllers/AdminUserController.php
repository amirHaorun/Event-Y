<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUser;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = \App\user::all();
        $auth_user=Auth::User();
        return view('admin.user.index',compact('users','auth_user'));
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
        return view('admin.user.create',compact('auth_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $input = $request->all();


        $input['password'] =    bcrypt($input['password']);
        \App\user::create($input);

        $request->session()->flash('alert-success', 'user was successful added!');
        return redirect('admin/user');
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
        $user = user::findOrFail($id);
        $auth_user = Auth::User();
        return view('admin.user.edit',compact('user','auth_user'));
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
        $user = user::findOrFail($id);
        $input = $request->all();
        if(!request()->file('photo')) $request['photo'] = $user->photo;
        //if there's delete the old one first then save the new one
        else {
            // checking if the last image was a real image if it was real image and exists in file delete it
            // if its not real image , There's no need to delete any last image
            if(!file_exists(public_path().'/storage'.$user->photo)) {
                unlink('storage/' . $user->photo);
            }
             $input['photo'] = request('photo')->store('photos');

        }
        $input['password'] =    bcrypt($input['password']);
        $user->update($input);
        $user->updated_by = auth()->user()->full_name;
        $user->save();
        $request->session()->flash('edit-success', 'user was Edited Successfully!');

        return redirect('admin/user');
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
        $user = user::findOrFail($id);
        $image_path = public_path().'/'.'img'.'/'.$user->photo->photo_path;
        unlink($image_path);
        $user->photo()->delete();
        $user->delete();
        session()->flash('delete-success', 'user was Deleted Successfully!');
        return redirect('admin/user');
    }
}
