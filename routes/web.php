<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\InsightController;

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
Route::group(['middleware'=>'auth'], function(){
    Route::get('profile', [ProfileController::class, 'index'])->name('index');
    Route::get('profile/edit', function(){
        return view('profile.edit.edit_entrance');
        })->name('edit');
    Route::get('profile/edit/image', [ImageController::class, 'index'])->name('image_edit');
    Route::post('profile/edit/image/post',[ImageController::class, 'store'])->name('image_post');
    Route::get('profile/edit/base',[BaseController::class, 'index'])->name('base');
    Route::post('profile/edit/base/post', [BaseController::class, 'update'])->name('edit_base');
    Route::get('profile/edit/song', [SongController::class, 'index'])->name('song_edit');
    Route::post('profile/edit/song/post', [SongController::class, 'store'])->name('song_post');
    Route::post('profile/edit/song/delete', [Songcontroller::class, 'delete'])->name('song_delete');
    Route::get('profile/edit/goal', [GoalController::class, 'index'])->name('goal_edit');
    Route::post('profile/edit/goal/post', [GoalController::class, 'update'])->name('goal_post');
    Route::get('profile/edit/member', [MemberController::class, 'index'])->name('member_edit');
    Route::post('profile/edit/member/post', [MemberController::class, 'create'])->name('member_create');
    Route::get('profile/edit/member/{id}',[MemberController::class, 'prepare'])->name('member_rewrite');
    Route::post('profile/edit/member/{id}/post',[MemberController::class, 'update'])->name('member_rewrite_post');
    Route::post('profile/edit/member/delete/{id}', [MemberController::class, 'delete'])->name('member_delete');
    Route::get('profile/edit/film', [FilmController::class, 'index'])->name('film_edit');
    Route::post('profile/edit/film/post', [FilmController::class, 'create'])->name('film_create');
    Route::get('profile/edit/film/{id}',[FilmController::class, 'prepare'])->name('film_rewrite');
    Route::post('profile/edit/film/{id}/post',[FilmController::class, 'update'])->name('film_rewrite_post');
    Route::post('profile/edit/film/delete/{id}', [FilmController::class, 'delete'])->name('film_delete');
    Route::get('profile/edit/connection/{id}', [ConnectionController::class, 'index'])->name('connection_edit');
    Route::post('profile/edit/connection/{id}/post', [ConnectionController::class, 'update'])->name('connection_edit_post');

    Route::post('/connection/add', [ConnectionController::class, 'add'])->name('connection_add');
    Route::post('/connection/delete', [ConnectionController::class, 'delete'])->name('connection_delete');

    Route::get('/setting', function(){
        return view('auth.setting');
    })->name('setting');

});

    Route::get('profile/{name?}',[BrowseController::class, 'index'])->name('browse');

//準備中のページ群
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::post('/search/result', [SearchController::class, 'runsearch'])->name('search_result');
    Route::get('/insight', [InsightController::class, 'random'])->name('insight');
     Route::get('/mail', function(){
        abort(404);
     })->name('mail');