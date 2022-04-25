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
    return redirect('login');
})->name('welcome');

Route::get('/decline', function () {return view('decline');})->name('decline');

Auth::routes();
header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers', 'Content-Type, Authorizations');
Route::get('/user_login', 'serviceController@checkuserlogin')->name('checkuserlogin');
Route::get('/gpr', 'serviceController@gprform')->name('gpr');
Route::get('/pel', 'serviceController@pelform')->name('pel');
Route::get('/cement', 'serviceController@cementform')->name('cement');
Route::get('/es', 'serviceController@index')->name('es');
Route::post('/es_store', 'serviceController@save_service')->name('es_store');
Route::post('/pel_store', 'serviceController@save_pel_service')->name('pel_store');
Route::post('/gpr-store', 'serviceController@save_gpr_service')->name('gpr_store');
Route::post('/cement-store', 'serviceController@save_cement_service')->name('cement_store');
Route::get('appointment', 'AppointmentsController@index');
Route::get('showemployee/{employee}','serviceController@show_employee')->name('showemployee');
Route::get('view_employee', 'serviceController@get_employee');
Route::post('employee_update/{employee}', 'serviceController@employee_update')->name('employee_update');
Route::post('delete_employee/{employee}', 'serviceController@delete_employe')->name('delete_employ');
Route::post('paypal/express-checkout', 'PaypalController@expressCheckout');
Route::get('paypal/express-checkout-success', 'PaypalController@expressCheckoutSuccess');
Route::post('paypal/notify', 'PaypalController@notify');
Route::get('/paypalredirection/{id}', 'serviceController@redirection');
Route::get('/gprservice', 'serviceController@gprservice')->name('gprservice');
Route::get('/esservice', 'serviceController@gprservice')->name('gprservice');
Route::get('/cementservice', 'serviceController@gprservice')->name('gprservice');
Route::get('/termsandcondition', 'serviceController@termsandcondition')->name('termsandcondition');
Route::get('new_uploading', 'serviceController@newUploading');
Route::get('/promocode_exist', 'PromocodeController@promocoodeExist');
Route::get('/termAndConditions', function () {
    return view('terms');
})->name('terms');
Route::group(['prefix' => '', 'middleware' => ['auth']], function () {
    Route::resource('promocode', 'PromocodeController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/users', 'HomeController@users')->name('users');
    Route::get('/es/{id}', 'serviceController@show')->name('services.es.show');
    Route::get('/gpr/{id}', 'serviceController@showGprFormDetail')->name('services.gpr.show');
    Route::get('/cement/{id}', 'serviceController@showCementFormDetail')->name('services.cement.show');
    Route::get('/pel/{id}', 'serviceController@showPelForm')->name('services.pel.show');
    Route::get('/es/edit/{id}', 'serviceController@editShow');
    Route::post('/es_update/{id}', 'serviceController@editUpdate');
    Route::get('/es/cancel/{id}', 'serviceController@emCancel');
    Route::get('/es/delete/{id}', 'serviceController@emDelete');
    Route::get('/pel/delete/{id}', 'serviceController@pelDelete');
    Route::get('/cement/delete/{id}', 'serviceController@cementDelete');
    Route::get('/gpr/delete/{id}', 'serviceController@gprDelete');
    Route::get('/cement/cancel/{id}', 'serviceController@cementCancel');
    Route::get('/gpr/cancel/{id}', 'serviceController@gprCancel');
    Route::get('/pel/cancel/{id}', 'serviceController@pelCancel');
    Route::get('/gpr/edit/{id}', 'serviceController@editgprShow');
    Route::get('/pel/edit/{id}', 'serviceController@editpelShow');
    Route::post('/gpr_update/{id}', 'serviceController@editgprUpdate');
    Route::post('/pel_update/{id}', 'serviceController@editpelUpdate');
    Route::get('/cement/edit/{id}', 'serviceController@editcementShow');
    Route::post('/cement_update/{id}', 'serviceController@editcementUpdate');
    Route::get('/service', function () {
        return view('admin.services');
    })->name('services');
    Route::get('/user_projects', 'serviceController@projects')->name('user_projects');
    Route::get('/cement_projects', 'serviceController@projectCement')->name('projectCement');
    Route::get('/gpr_projects', 'serviceController@projectGpr')->name('projectGpr');
    Route::get('/pel_projects', 'serviceController@projectPel')->name('projectPel');
    Route::get('/invoice', 'HomeController@invoice')->name('invoice');
    Route::get('/new_upload', 'FileController@index')->name('new_upload');
    Route::post('file/upload', 'FileController@store')->name('file.upload');
    Route::get('file/view', 'FileController@view')->name('documents_view');
    Route::post('upload', 'FileController@upload')->name('upload');
    Route::get('/datatables', 'DatatablesController@anyData')->name('datatables.data');
    Route::get('/user', 'DatatablesController@getIndex')->name('datatables');
    Route::resource('comments', 'CommentsController');
    Route::get('/employee', function () {return view('admin.appointments.employe_create');});
    Route::post('/employee-create', 'serviceController@createEmloyee')->name('employee_create');
    Route::resource('appointments', 'AppointmentsController');
    Route::post('appointments_mass_destroy', ['uses' => 'AppointmentsController@massDestroy', 'as' => 'appointments.mass_destroy']);
    Route::get('/invoice', 'HomeController@invoice')->name('invoice');
    Route::get('/invoice/{id}', 'HomeController@getInvoice')->name('getInvoice');
});

