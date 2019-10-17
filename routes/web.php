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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('staff/register', ['as' => 'profile', 'uses' => 'StaffController@Profile']);
    Route::put('staff/profile', ['as' => 'update', 'uses' => 'StaffController@update']);
    Route::get('staff/profile', ['as' => 'staff.profile', 'uses' => 'StaffController@show']);
    Route::post('passport', 'StaffController@update_passport');
    Route::post('staff/register/addChildren', ['as' => 'addStaffChildren', 'uses' => 'StaffController@addStaffChildren']);
    //Aper
    Route::get('aper/apply', ['as' => 'create', 'uses' => 'AperFormController@create']);
    Route::post('aper/apply', ['as' => 'apply', 'uses' => 'AperFormController@apply']);
    Route::get('aper/details', ['as' => 'details', 'uses' => 'AperFormController@applicationDetails']);
    //Route::get('admin/aper/details/{sid}',['as' => 'details', 'uses' => 'AperFormController@applicationDetails']);
    Route::get('admin/aper/details/{sid}', 'AperFormController@adminAperDetails');
    Route::get('admin/aper/index', ['as' => 'admin/index', 'uses' => 'AperFormController@index']);
    Route::get('aper/edit', ['as' => 'edit', 'uses' => 'AperFormController@edit']);
    Route::get('aper/edit', ['as' => 'edit', 'uses' => 'AperFormController@edit']);
    Route::get('staff/dashboard', function () {
        return view('staff.dashboard');
    });
    Route::get('aper/success', function () {
        return view('aper.success');
    });
    Route::get('aper/error', function () {
        return view('aper.already_applied');
    });

    Route::post('aper/addAcademicQualification', ['as' => 'addAcademicQualification', 'uses' => 'AperFormController@addAcademicQualification']);
    Route::post('aper/addStaffChildren', ['as' => 'addStaffChildren', 'uses' => 'AperFormController@addStaffChildren']);
    Route::post('aper/addPublications', ['as' => 'addPublications', 'uses' => 'AperFormController@addPublications']);
    Route::get('aper/feedback', ['as' => 'aper.feedback', 'uses' => 'AperFormController@feedback']);
});
    Route::group(['middleware' => ['auth','admin']], function () {
    //Comments
    Route::post('aper/hodComment/{id}',['as' => 'hodComment', 'uses' => 'AperFormController@hodComment']);
    Route::post('aper/facultyComment/{id}',['as' => 'facultyComment', 'uses' => 'AperFormController@facultyComment']);
    Route::post('aper/complexComment/{id}',['as' => 'complexComment', 'uses' => 'AperFormController@complexComment']);
//Evaluation
    Route::get('aper/hod/evaluate', function () {
        return view('hod.evaluate');
    });

    Route::get('aper/home', function () {
        return view('aper.home');
    });
    Route::get('aper/hod/forms', ['as' => 'hod.forms', 'uses' => 'AperFormController@hodForms']);
    Route::get('aper/faculty/forms', ['as' => 'faculty.forms', 'uses' => 'AperFormController@fIndex']);
    Route::get('aper/complex/forms', ['as' => 'complex.forms', 'uses' => 'AperFormController@complexIndex']);
    Route::get('aper/details/{sid}', 'AperFormController@staffAperDetails');
    Route::post('/hod/approve/{id}', 'AperFormController@hodApproval');
    Route::post('/faculty/approve/{id}', 'AperFormController@facApproval');
    Route::post('/complex/approve/{id}', 'AperFormController@complexApproval');
    Route::post('/complex/evaluate/{id}', 'ScoringSystemController@score');
    Route::get('/evaluated-forms', 'ScoringSystemController@index');
    Route::get('/evaluated/{sid}', 'AperFormController@evaluation');
    Route::get('/aper/promoted', 'AperFormController@promotedStaff');
    Route::get('/aper/not-promoted', 'AperFormController@notpromotedStaff');

});