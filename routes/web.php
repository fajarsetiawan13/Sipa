<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QRController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Main Route
Route::get('/', [MainController::class, 'index'])->name('login')->middleware('guest');
Route::get('/about', [MainController::class, 'about'])->middleware('guest');
Route::get('/article', [MainController::class, 'article'])->middleware('guest');
Route::get('/article/{slug}', [MainController::class, 'showArticle'])->middleware('guest');
Route::get('/register', [MainController::class, 'register'])->middleware('guest');
Route::get('/forget-password', [MainController::class, 'forget_password'])->middleware('guest');
Route::post('/forget-password', [MainController::class, 'forgeting']);
Route::post('/login', [MainController::class, 'authenticate']);
Route::post('/register', [MainController::class, 'registration']);
Route::post('/logout', [MainController::class, 'logout']);
Route::post('/sendmessage', [MainController::class, 'sendmessage']);

// Dashboard Route
Route::get('/manage', [DashboardController::class, 'manage'])->middleware('admin');
Route::get('/manage/messages', [DashboardController::class, 'messages'])->middleware('admin');
Route::get('/manage/cover', [DashboardController::class, 'edit_cover'])->middleware('admin');
Route::put('/manage/cover', [DashboardController::class, 'change_cover']);
Route::post('/manage/image-cover', [DashboardController::class, 'change_image_cover']);

Route::get('/manage/posts', [PostController::class, 'posts'])->middleware('admin');
Route::get('/manage/posts/new', [PostController::class, 'newPost'])->middleware('admin');
Route::get('/manage/posts/checkSlug', [PostController::class, 'checkSlug'])->middleware('admin');
Route::get('/manage/posts/{post}', [PostController::class, 'showPost'])->middleware('admin');
Route::get('/manage/posts/{post}/edit', [PostController::class, 'editPost'])->middleware('admin');
Route::get('/manage/posts/{post}/delete', [PostController::class, 'deletePost'])->middleware('admin');
Route::post('/manage/posts/save', [PostController::class, 'savePost']);
Route::put('/manage/posts/{post}/edit', [PostController::class, 'updatePost']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/tracking', [LocationController::class, 'index'])->middleware('auth');
Route::get('/password', [DashboardController::class, 'edit_password'])->middleware('auth');
Route::get('/password/{user}', [DashboardController::class, 'reset_password'])->middleware('admin');
Route::post('/password', [DashboardController::class, 'ubah_password']);
Route::post('/addphotos', [DashboardController::class, 'add_photos']);
Route::delete('/photos/{image}/delete', [DashboardController::class, 'delete_photos']);
Route::put('/changeimage', [DashboardController::class, 'change_image']);

Route::get('/users', [DashboardController::class, 'users'])->middleware('admin');
Route::get('/activate/{user}', [DashboardController::class, 'activate'])->middleware('admin');
Route::get('/deactivate/{user}', [DashboardController::class, 'deactivate'])->middleware('admin');
Route::get('/user/{user}', [DashboardController::class, 'user_detail'])->middleware('admin');
Route::put('/user/role/{user}', [DashboardController::class, 'user_role'])->middleware('admin');

Route::get('/generate/{user}', [QRController::class, 'generate'])->middleware('admin');
Route::get('/{information:qr_page}', [QRController::class, 'userPage']);
Route::post('/meet/{user}', [QRController::class, 'userMeet']);

Route::resource('/information', InformationController::class)->middleware('auth');
Route::resource('/dashboard/contact', ContactController::class)->middleware('auth');
