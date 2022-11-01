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
    return view('auth.login'); 
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('faculties','FacultyController');   //
Route::resource('depts','DeptController');
Route::resource('degrees','DegreeController');
Route::resource('admissiontypes','AdmissiontypeController');
Route::resource('docs','DocController'); 
Route::get('download/{id}', 'DocController@get_file')->name('download');

// StudentController
Route::get('/getdepts/{id}','StudentController@getdepts')->name('getdepts');
Route::resource('students','StudentController'); 
Route::post('/import','StudentController@import')->name('import');
Route::get('/export', 'StudentController@export');
Route::get('/GetExportView', 'StudentController@GetExportView');
Route::post('search', 'StudentController@search');
Route::get('/GetSearchView','StudentController@GetSearchView')->name('GetSearchView'); 
Route::post('search', 'StudentController@search');

Route::resource('reports','ReportsController');
Route::post('GetReportResult','ReportsController@GetReportResult');
/*
Route::get('GetDeptsViewReports','ReportsController@GetDeptsViewReports');
Route::post('GetDeptsResult','ReportsController@GetDeptsResult');

Route::get('GetFacultiesViewReports','ReportsController@GetFacultiesViewReports');
Route::post('GetFacultiesResult','ReportsController@GetFacultiesResult');
 */           
 

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});
