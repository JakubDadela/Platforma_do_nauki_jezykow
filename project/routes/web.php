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

Route::resource('/comments', App\Http\Controllers\CommentController::class)->middleware('auth');

Route::resource('/quizzes', App\Http\Controllers\QuizController::class)->middleware('auth');
Route::resource('/languages',App\Http\Controllers\LanguageController::class)->middleware('auth');
Route::resource('dashboard', App\Http\Controllers\Dashboard::class)->middleware('auth');
Route::resource('quizzes.comments', App\Http\Controllers\QuizCommentController::class)->middleware('auth');
Route::resource('quizzes.questions', App\Http\Controllers\QuestionController::class)->middleware('auth');
Route::resource('quizzes.solutions', App\Http\Controllers\SolutionController::class)->middleware('auth');
Route::resource('/quizzes.comments.subcomments',\App\Http\Controllers\CommentSubcommentController::class)->middleware('auth');
Route::resource('admin',\App\Http\Controllers\Admin::class)->middleware('auth');
Route::resource('expert',\App\Http\Controllers\Expert::class)->middleware('auth');
//Route::redirect('quizzes.questions.index2', 'App\Http\Controllers\QuizController@index2')->middleware('auth');


require __DIR__.'/auth.php';
