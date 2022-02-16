<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/loginn', 'HomeController@index10')->name('loginn');
Route::get('/advancedpolicies', 'HomeController@index1')->name('advancedpolicies');
Route::get('/Cancelploicy', 'HomeController@index2')->name('Cancelploicy');
Route::get('/changepassword', 'HomeController@index4')->name('changepassword');
Route::get('changepassword','rsyscontrol@showveiw');
Route::get('Password','rsyscontrol@changepass');
Route::post('Password','rsyscontrol@changepass');
Route::get('Cancelploicy','rsyscontrol@showformacanecl');
Route::get('cancelform','rsyscontrol@doingcancel');
Route::post('cancelform','rsyscontrol@doingcancel');
Route::get('advancedpolicies','rsyscontrol@Export');
Route::get('advacedform','rsyscontrol@Report');
Route::post('advacedform','rsyscontrol@Report');
Route::get('/register', 'HomeController@index5')->name('register');
Route::get('register','rsyscontrol@CreateVeiw');
Route::get('reg','rsyscontrol@createdate');
Route::post('reg','rsyscontrol@createdate');
Route::get('/resetpassword', 'HomeController@index6')->name('resetpassword');
Route::get('/res/{type}', 'rsyscontrol@resetVeiw');
Route::post('/res/{type}', 'rsyscontrol@resetdoing');
Route::get('/doreset', 'HomeController@index7')->name('doreset');
Route::get('/print', 'HomeController@index9')->name('print');
Route::post('/print', 'HomeController@index9')->name('print');
Route::get('return','rsyscontrol@reurnhome');
Route::post('return','rsyscontrol@reurnhome');
Route::get('home8','rsyscontrol@forcechange');
Route::get('ForcePassword','rsyscontrol@forcechangefun');
Route::post('ForcePassword','rsyscontrol@forcechangefun');
Route::get('/History', 'HomeController@index11')->name('History');
Route::post('/History','HomeController@index11')->name('History');
Route::get('print/{id}','rsyscontrol@display');
Route::get('/preview', 'HomeController@index12')->name('preview');
Route::post('/preview', 'HomeController@index12')->name('preview');
Route::get('/save', 'HomeController@index13')->name('save');
Route::post('/save', 'HomeController@index13')->name('save');
Route::get('/show', 'HomeController@index14')->name('show');
Route::post('/show', 'HomeController@index14')->name('show');
Route::get('/download', 'HomeController@index28')->name('download');
Route::post('/download', 'HomeController@index28')->name('download');

Route::get('/broker', 'HomeController@index15')->name('broker');
Route::get('/previewbroker', 'HomeController@index16')->name('previewbroker');
Route::post('/previewbroker', 'HomeController@index16')->name('previewbroker');
Route::get('/savebroker', 'HomeController@index17')->name('savebroker');
Route::post('/savebroker', 'HomeController@index17')->name('savebroker');
Route::get('/brokerexport', 'HomeController@index18')->name('brokerexport');
Route::get('/Review', 'HomeController@index23')->name('Review');
Route::get('/UpdatePolicy', 'HomeController@index24')->name('UpdatePolicy');
Route::post('brokerexpoert','rsyscontrol@brokerReport');
Route::post('insert','rsyscontrol@insertbroker');
Route::get('/pending', 'HomeController@index19')->name('pending');
Route::get('/Approve', 'HomeController@index20')->name('Approve');
Route::get('approve/{id}','rsyscontrol@approvebroker');
Route::get('printbroker/{id}','rsyscontrol@printbroker');
Route::get('/pendingUser', 'HomeController@index21')->name('pendingUser');
Route::get('Update/{id}','rsyscontrol@Updatebroker');
Route::post('doingUpdate/{id}','rsyscontrol@DoUpdate');
Route::get('/Updatebroker', 'HomeController@index22')->name('Updatebroker');
Route::get('/del/{type}', 'rsyscontrol@delete');
Route::post('savedaily','rsyscontrol@insertdaily');
Route::get('approv/{id}','rsyscontrol@approvedaily');
Route::post('financeapprove/{id}','rsyscontrol@financeAprove');
Route::get('printpolicy/{id}','rsyscontrol@printpolicy');
Route::get('review/{id}','rsyscontrol@reviewdaily');
Route::post('financeapprov/{id}','rsyscontrol@financeAprov');
Route::get('UpdatePolicy/{id}','rsyscontrol@UpdatePolicy');
Route::post('doingUpdatePolicy/{id}','rsyscontrol@DoUpdatePolicy');
Route::post('insertnote','rsyscontrol@insertnote');
Route::post('insertproblem','rsyscontrol@insertproblem');
Route::post('Upload','rsyscontrol@upload');
Route::get('download/{serial}','rsyscontrol@downloadfile');
Route::post('download/{serial}','rsyscontrol@downloadfile');

Route::get('Canacel/{id}','rsyscontrol@CanacelBroker');
Route::get('Canace/{id}','rsyscontrol@CanacelPolicy');
Route::get('/EmployeePrint', 'HomeController@index25')->name('EmployeePrint');
Route::get('/HistoryPrint', 'HomeController@index26')->name('HistoryPrint');
Route::get('CancelReview/{id}','rsyscontrol@CanacelReview');
Route::get('/AllPolicies', 'HomeController@index27')->name('AllPolicies');
Route::get('approvee/{id}','rsyscontrol@financeAprovee');
Route::get('/Flag', 'HomeController@index29')->name('Flag');
Route::post('checkbox','rsyscontrol@setflag');
Route::post('checkboxreset','rsyscontrol@setflagapprove');







