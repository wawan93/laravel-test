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

use App\Vacancy;

Route::get('/', function() {
    $view = View::make('vacancy.list', [
        'vacancies' => Vacancy::where(['moderated'=>true])->get()
    ]);

    return $view;
});

Route::auth();

Route::get('/vacancy/{vacancy}', function(Vacancy $vacancy) {
    return View::make('vacancy.view', [
        'vacancy' => $vacancy
    ]);
});
Route::get('/vacancy', 'VacancyController@all');
Route::post('/vacancy', 'VacancyController@create');
Route::delete('/vacancy/{vacancy}', 'VacancyController@destroy');
