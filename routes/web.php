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
 * Surveys non admin routes
 */
Route::get('/survey/{id}',
    [
        'uses' => 'SurveyController@takeSurvey',
        'as' => 'survey.take'
    ])->middleware('auth');

    Route::get('survey', [
        'uses' => 'SurveyController@getIndex',
        'as' => 'survey.index'
    ])->middleware('auth');

    Route::post('survey/create', [
        'uses' => 'SurveyController@surveyCreate',
        'as' => 'survey.create'
    ])->middleware('auth');

    Route::get('survey/output', [
        'uses' => 'SurveyController@getIndex',
        'as' => 'survey.output'
    ])->middleware('auth');
/*
 * end surveys non admin routes
 */

/*
 * Group admin pages
 * */
Route::group(['prefix' => 'admin'], function() {

    /*
     *  admin questions routes
     */
    Route::get('questions/', [
        'uses' => 'QuestionController@getAdminIndex',
        'as' => 'admin.questions.index'
    ])->middleware('auth');

    Route::get('questions/create', [
        'uses' => 'QuestionController@getAdminCreate',
        'as' => 'admin.questions.create'
    ])->middleware('auth');

    Route::post('questions/create', [
        'uses' => 'QuestionController@questionAdminCreate',
        'as' => 'admin.questions.create'
    ])->middleware('auth');

    Route::get('questions/edit/{id}', [
        'uses' => 'QuestionController@getAdminEdit',
        'as' => 'admin.questions.edit'
    ])->middleware('auth');

    Route::post('questions/edit', [
        'uses' => 'QuestionController@questionAdminUpdate',
        'as' => 'admin.questions.update'
    ])->middleware('auth');

    Route::get('questions/delete/{id}', [
        'uses' => 'QuestionController@questionAdminDelete',
        'as' => 'admin.questions.delete'
    ])->middleware('auth');
    /*
     * end admin questions routes
     */

    /*
     * Admin Answers Routes
     */
    Route::get('answers/', [
        'uses' => 'AnswerController@getAdminIndex',
        'as' => 'admin.answers.index'
    ])->middleware('auth');

    Route::get('answers/create', [
        'uses' => 'AnswerController@getAdminCreate',
        'as' => 'admin.answers.create'
    ])->middleware('auth');

    Route::post('answers/create', [
        'uses' => 'AnswerController@answerAdminCreate',
        'as' => 'admin.answers.create'
    ])->middleware('auth');

    Route::get('answers/edit/{id}', [
        'uses' => 'AnswerController@getAdminEdit',
        'as' => 'admin.answers.edit'
    ])->middleware('auth');

    Route::post('answers/edit', [
        'uses' => 'AnswerController@answerAdminUpdate',
        'as' => 'admin.answers.update'
    ])->middleware('auth')->middleware('auth');

    Route::get('answers/delete/{id}', [
        'uses' => 'AnswerController@answerAdminDelete',
        'as' => 'admin.answers.delete'
    ])->middleware('auth');
    /*
     * end admin answers routes
     */

    /*
     * admin surveys routes
     */
    Route::get('surveys/', [
        'uses' => 'SurveyController@getAdminIndex',
        'as' => 'admin.surveys.index'
    ])->middleware('auth');

    Route::get('surveys/create', [
        'uses' => 'SurveyController@getAdminCreate',
        'as' => 'admin.surveys.create'
    ])->middleware('auth');

    Route::post('surveys/create', [
        'uses' => 'SurveyController@surveyAdminCreate',
        'as' => 'admin.surveys.create'
    ])->middleware('auth');

    Route::get('surveys/edit/{id}', [
        'uses' => 'SurveyController@getAdminEdit',
        'as' => 'admin.surveys.edit'
    ])->middleware('auth');

    Route::post('surveys/edit', [
        'uses' => 'SurveyController@surveyAdminUpdate',
        'as' => 'admin.surveys.update'
    ])->middleware('auth');

    Route::get('surveys/delete/{id}', [
        'uses' => 'SurveyController@surveyAdminDelete',
        'as' => 'admin.surveys.delete'
    ])->middleware('auth');
    /*
     * end admin surveys routes
     */
});

/*
 * End admin page grouping
 * */

Auth::routes();
