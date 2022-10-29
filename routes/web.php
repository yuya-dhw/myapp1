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
    Route::get('profile', [ProfileController::class, 'index']);
    Route::get('profile/edit/image', [ImageController::class, 'index']);
    Route::post('profile/edit/image/post',[ImageController::class, 'store']);
    Route::get('profile/edit/base',[BaseController::class, 'index']);
    Route::post('profile/edit/base/post', [BaseController::class, 'update'])->name('edit_base');
    Route::get('profile/edit/song', [SongController::class, 'index']);
    Route::post('profile/edit/song/post', [SongController::class, 'store']);
    Route::get('profile/edit/goal', [GoalController::class, 'index']);
    Route::post('profile/edit/goal/post', [GoalController::class, 'update']);
    Route::get('profile/edit/member', [MemberController::class, 'index']);
    Route::post('profile/edit/member/post', [MemberController::class, 'create']);
    Route::get('profile/edit/member/{id}',[MemberController::class, 'prepare'])->name('member_rewrite');
    Route::post('profile/edit/member/{id}/post',[MemberController::class, 'update'])->name('member_rewrite_post');
    Route::post('profile/edit/member/delete/{id}', [MemberController::class, 'delete'])->name('member_delete');
    Route::get('profile/edit/film', [FilmController::class, 'index'])->name('film_edit');
    Route::post('profile/edit/film/post', [FilmController::class, 'create']);
    Route::get('profile/edit/film/{id}',[FilmController::class, 'prepare'])->name('film_rewrite');
    Route::post('profile/edit/film/{id}/post',[FilmController::class, 'update'])->name('film_rewrite_post');
    Route::post('profile/edit/film/delete/{id}', [FilmController::class, 'delete'])->name('film_delete');
    Route::get('profile/edit/connection/{id}', [ConnectionController::class, 'index'])->name('connection_edit');
    Route::post('profile/edit/connection/{id}/post', [ConnectionController::class, 'update'])->name('connection_edit_post');

    Route::post('/connection/add', [ConnectionController::class, 'add']);
    Route::post('/connection/delete', [ConnectionController::class, 'delete']);

    Route::get('setting', function(){
        return view('auth.setting');
    });

});

Route::get('profile/{name?}',[BrowseController::class, 'index'])->name('browse');
