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

Route::get('/home', 'HomeController@index');

/*
 * Surveys
 */
Route::get('/survey/{id}',
    [
        'uses' => 'SurveyController@takeSurvey',
        'as' => 'survey.take'
    ]);

    Route::get('survey', [
        'uses' => 'SurveyController@getIndex',
        'as' => 'survey.index'
    ]);

    Route::post('survey/create', [
        'uses' => 'SurveyController@surveyCreate',
        'as' => 'survey.create'
    ]);

    Route::get('survey/output', [
        'uses' => 'SurveyController@getIndex',
        'as' => 'survey.output'
    ]);
/*
 * end surveys routes
 * */

/*
 * admin survey routes
 * */
Route::get('admin/surveys/', [
    'uses' => 'SurveyController@getAdminIndex',
    'as' => 'admin.surveys.index'
]);

Route::get('admin/surveys/create', [
    'uses' => 'SurveyController@getAdminCreate',
    'as' => 'admin.surveys.create'
]);

Route::post('admin/surveys/create', [
    'uses' => 'SurveyController@surveyAdminCreate',
    'as' => 'admin.surveys.create'
]);

Route::get('admin/surveys/edit/{id}', [
    'uses' => 'SurveyController@getAdminEdit',
    'as' => 'admin.surveys.edit'
]);

Route::post('admin/surveys/edit', [
    'uses' => 'SurveyController@surveyAdminUpdate',
    'as' => 'admin.surveys.update'
]);

Route::get('admin/surveys/delete/{id}', [
    'uses' => 'SurveyController@surveyAdminDelete',
    'as' => 'admin.surveys.delete'
]);
/**
 * end admin routes
 */


Route::group(['prefix' => 'admin'], function() {

    /* questions routes */

    Route::get('questions/', [
        'uses' => 'QuestionController@getAdminIndex',
        'as' => 'admin.questions.index'
    ]);

    Route::get('questions/create', [
        'uses' => 'QuestionController@getAdminCreate',
        'as' => 'admin.questions.create'
    ]);

    Route::post('questions/create', [
        'uses' => 'QuestionController@questionAdminCreate',
        'as' => 'admin.questions.create'
    ]);

    Route::get('questions/edit/{id}', [
        'uses' => 'QuestionController@getAdminEdit',
        'as' => 'admin.questions.edit'
    ]);

    Route::post('questions/edit', [
        'uses' => 'QuestionController@questionAdminUpdate',
        'as' => 'admin.questions.update'
    ]);

    Route::get('questions/delete/{id}', [
        'uses' => 'QuestionController@questionAdminDelete',
        'as' => 'admin.questions.delete'
    ]);

/* Answers Routing */

    Route::get('answers/', [
        'uses' => 'AnswerController@getAdminIndex',
        'as' => 'admin.answers.index'
    ]);
    Route::get('answers/create', [
        'uses' => 'AnswerController@getAdminCreate',
        'as' => 'admin.answers.create'
    ]);

    Route::post('answers/create', [
        'uses' => 'AnswerController@answerAdminCreate',
        'as' => 'admin.answers.create'
    ]);

    Route::get('answers/edit/{id}', [
        'uses' => 'AnswerController@getAdminEdit',
        'as' => 'admin.answers.edit'
    ]);

    Route::post('answers/edit', [
        'uses' => 'AnswerController@answerAdminUpdate',
        'as' => 'admin.answers.update'
    ]);

    Route::get('answers/delete/{id}', [
        'uses' => 'AnswerController@answerAdminDelete',
        'as' => 'admin.answers.delete'
    ]);

});

Auth::routes();
