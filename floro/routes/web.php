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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/home', 'HomeController@index')->name('user.index');



Route::resource('users', 'UserController');
Route::get('search', 'UserController@search');
Route::get('sort', 'HomeController@sort');


Route::get('/export_excel', 'ExportExcelController@index');
Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');

Route::get('/2fa','PasswordSecurityController@show2faForm')->name('2fa');
Route::post('/generate2faSecret','PasswordSecurityController@generate2faSecret')->name('generate2faSecret');
Route::post('/2fa','PasswordSecurityController@enable2fa')->name('enable2fa');
Route::post('/disable2fa','PasswordSecurityController@disable2fa')->name('disable2fa');

Route::get('/admin', function () {
    return view('admin.index');
    })->middleware(['auth', '2fa']);

    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
        })->name('2faVerify')->middleware('2fa');





