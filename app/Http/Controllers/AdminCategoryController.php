<?php

namespace App\Http\Controllers;
use App\categories;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminCategoryController extends Controller
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
        $categories = \App\categories::all();
        return view('admin.categories.index',compact('auth_user','categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        //
        \App\categories::create($request->all());
        $request->session()->flash('alert-success', 'Category was successful added!');

        return redirect('./admin/category');
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

        $category = categories::findOrFail($id);
        $request->session()->flash('edit-success', 'Category was Edited Successfully!');

        $category->update($input);
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
        $category = categories::findOrFail($id);

        $category->delete();
        session()->flash('delete-success', 'Category was Deleted Successfully!');

        return  back();
    }
}
