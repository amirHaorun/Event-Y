<?php

namespace App\Http\Controllers;

use App\about;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth_user = Auth::user();
        $about = about::findOrFail(1);

        return view('admin.about.about',compact('auth_user','about'));
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
        //
        $about = about::findOrFail(1);

        $about->header = $request->header;
        $about->content = $request->about_content;
        $request->session()->flash('edit-success', 'About Page was Edited Successfully!');

        $about->save();
        return back();
    }

}
