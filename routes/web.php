<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['middleware' => ['web']], function () {

Route::group(['middleware' => ['guest']], function ()
{

    Route::get('/', 'AuthController@showLogin');

    Route::post('/', 'AuthController@doLogin');

    Route::get('submit', 'ApplicantsController@add')->name('add-applicants');
    Route::post('submit', 'ApplicantsController@create');
});

Route::group(['middleware' => ['auth']], function ()
{
    //Routes for departments
    Route::group(['prefix' => 'departments'], function($router) {
        Route::get('/', 'DepartmentsController@getAll')->name('list-departments');
        Route::get('add', 'DepartmentsController@add')->name('add-departments');
        Route::post('add', 'DepartmentsController@create');
        Route::get('edit/{id}', 'DepartmentsController@edit')->name('edit-departments');
        Route::post('edit/{id}', 'DepartmentsController@update');
        Route::get('delete/{id}', 'DepartmentsController@delete')->name('delete-departments');
    });

    Route::group(['prefix' => 'positions'], function($router) {
        Route::get('/', 'PositionsController@getAll')->name('list-positions');
        Route::get('add', 'PositionsController@add')->name('add-positions');
        Route::post('add', 'PositionsController@create');
        Route::get('edit/{id}', 'PositionsController@edit')->name('edit-positions');
        Route::post('edit/{id}', 'PositionsController@update');
        Route::get('delete/{id}', 'PositionsController@delete')->name('delete-positions');
    });

    Route::group(['prefix' => 'jobs'], function($router) {
        Route::get('/', 'JobsController@getAll')->name('list-jobs');
        Route::get('add', 'JobsController@add')->name('add-jobs');
        Route::post('add', 'JobsController@create');
        Route::get('edit/{id}', 'JobsController@edit')->name('edit-jobs');
        Route::post('edit/{id}', 'JobsController@update');
        Route::get('delete/{id}', 'JobsController@delete')->name('delete-jobs');
    });

    Route::group(['prefix' => 'applicants'], function($router) {
        Route::get('/', 'ApplicantsController@getAll')->name('list-applicants');
        // Route::get('/', 'ApplicantsController@create')->name('list-applicants');
        Route::get('/{id}', 'ApplicantsController@view')->name('view-applicants');
        // Route::get('edit/{id}', 'ApplicantsController@edit')->name('edit-applicants');
        // Route::get('edit/{id}', 'ApplicantsController@update')->name('edit-applicants');
        Route::post('edit/{id}', 'ApplicantsController@update');
        Route::get('delete/{id}', 'ApplicantsController@delete')->name('delete-applicants');        
    });

    Route::group(['prefix' => 'applications'], function($router) {
        Route::get('/', 'ApplicationsController@getAll')->name('list-applications');
        Route::get('/{id}', 'ApplicationsController@getById')->name('detail-applictions');
    });


});