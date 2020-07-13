<?php

use App\Location;

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

Route::get('/', function () {

//     $l = Location::all();



//  foreach($l as $ll){

//     echo $ll->equipments()->get();
//  }

    //return $l;





    return view('welcome');
});

Auth::routes();



/*
|--------------------------------------------------------------------------
| USERS : HomeController
|--------------------------------------------------------------------------
|
| Here is the control for ordinary users
|
|
*/

Route::prefix('home')->group(function () {

    Route::get('access-denied', 'HomeController@ad')->name('home.ad');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/users', 'HomeController@users')->name('home.users');



    Route::get('add-location', 'HomeController@add_location')->name('home.add.location');
    Route::get('{location}/edit-location', 'HomeController@edit_location')->name('home.edit.location');
    Route::put('/{location}/update-location', 'HomeController@update_location')->name('home.update.location');
    Route::post('store-location', 'HomeController@store_location')->name('home.store.location');
    Route::get('view-location', 'HomeController@view_location')->name('home.view.location');
    Route::get('{location}/delete-location', 'HomeController@delete_location')->name('home.delete.location');


    Route::get('view-location/{location}', 'HomeController@view_specific_location')->name('home.view.specific.location');
    Route::post('store-location-spec', 'HomeController@store_location_spec')->name('home.store.location.spec');





    // edit equipments in a specific row
    Route::get('view-location/{location}/{equipment}/edit-equipment-in-location', 'HomeController@edit_equipment_in_location')->name('home.edit.equipment.in.location');
    Route::put('view-location/{location}/{equipment}/update-equipment-in-location', 'HomeController@update_equipment_in_location')->name('home.update.equipment.in.location');
// delete equipment
    Route::get('{location}/{equipment}/delete-equipment-in-location', 'HomeController@delete_equipment_in_location')->name('admin.delete.equipment.in.location');


    // Transfer page
    Route::get('transfer/{location}/{equipment}', 'HomeController@transfer')->name('home.view.transfer');
    Route::post('transfer/{location}/{equipment}', 'HomeController@transfer_post')->name('home.post.transfer');


    Route::get('add-equipment', 'HomeController@add_equipment')->name('home.add.equipment');
    Route::get('{equipment}/edit-equipment', 'HomeController@edit_equipment')->name('home.edit.equipment');
    Route::put('/{equipment}/update-equipment', 'HomeController@update_equipment')->name('home.update.equipment');
    Route::post('store-equipment', 'HomeController@store_equipment')->name('home.store.equipment');
    Route::get('view-equipment', 'HomeController@view_equipment')->name('home.view.equipment');
    Route::get('{equipment}/delete-equipment', 'HomeController@delete_equipment')->name('home.delete.equipment');



    Route::get('print-report/{location}', 'HomeController@print_report')->name('home.print.location');


    Route::get('print-all-report', 'HomeController@print_all_report')->name('home.print.all.report');

});






/*
|--------------------------------------------------------------------------
| ADMIN : AdminController
|--------------------------------------------------------------------------
|
| Here is the control for admin users
|  they can check everything
|
*/



Route::prefix('admin')->group(function () {


    Route::get('add-role', 'AdminController@add_role')->name('admin.add.role');
    Route::get('{role}/edit-role', 'AdminController@edit_role')->name('admin.edit.role');
    Route::put('/{role}/update-role', 'AdminController@update_role')->name('admin.update.role');
    Route::post('store-role', 'AdminController@store_role')->name('admin.store.role');
    Route::get('view-role', 'AdminController@view_role')->name('admin.view.role');
    Route::get('{role}/delete-role', 'AdminController@delete_role')->name('admin.delete.role');



    Route::get('all_users', 'AdminController@all_users')->name('admin.all.users');
    Route::get('add-user', 'AdminController@add_user')->name('admin.add.user');
    Route::post('store_user', 'AdminController@store_user')->name('admin.store.user');
    Route::get('delete_user/{user}', 'AdminController@delete_user')->name('admin.delete.user');
    Route::get('edit-user/{user}', 'AdminController@edit_user')->name('admin.edit.user');
    Route::put('update_user/{user}', 'AdminController@update_user')->name('admin.update.user');



});
