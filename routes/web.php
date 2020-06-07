<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Carbon\Carbon;

Route::get('/',['uses'=>'UserMainController@index']);




Auth::routes();
// THIS IS ONLY FOR THE ADMIN - MIDDLE WARRE DO THIS
Route::group(['middleware'=>'admin'],function(){

    Route::get('/admin', function () {
          $auth_user = Auth::User();
          $purchases = \App\Purchases::all('value');
          $events_count = \App\events::count();
          $cart = DB::table('cart_ticket')->count();
        return view('admin.admin',compact('auth_user','purchases','events_count','cart'));
    });
    Route::resource('/admin/user', 'AdminUserController');
    Route::resource('/admin/category', 'AdminCategoryController');

    Route::get('admin/events','AdminEventController@index')->name('events.main');
    Route::get('admin/events/create','AdminEventController@create')->name('events.create');
    Route::post('admin/events/store','AdminEventController@store')->name('events.store');
    Route::get('admin/events/{id}/delete','AdminEventController@destroy')->name('events.destroy');
    Route::get('admin/events/{id}/edit','AdminEventController@edit')->name('events.edit');
    Route::patch('admin/events/{id}/update','AdminEventController@update')->name('events.update');


    Route::resource('/admin/tickets', 'AdminTicketController');
    Route::resource('/admin/shows', 'AdminShowsController');
    Route::resource('/admin/about','AdminAboutController');
    Route::get('/admin/orders',['uses'=>'AdminPurchasesController@index']);
    Route::get('/admin/orders/{purchase_id}/{status}/status',['uses'=>'AdminPurchasesController@status']);
});
Route::group(['middleware'=>'cart'],function()
{
    Route::resource('/cart','UserCartController');
    Route::resource('/purchase','UserPurchasesController');
    Route::post('/confirmpurchase',['uses'=>'UserCartController@ConfirmPurchase']);
    Route::get('/purchase/cancel/{order_id}','UserPurchasesController@cancellation_request')->name('order.cancel');
});
Route::resource('/main','UserMainController');

Route::get('/main/category/{id}',['uses'=>'UserMainController@show_categ_events'])->name('category.events');

Route::get('/about ','UserMainController@about_page')->name('aboutus');


Auth::routes();

