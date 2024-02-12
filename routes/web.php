<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserView;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserView::class, 'home'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('news/hello', [NewsController::class, 'showDatatable'])->name('news.hello');
    Route::resource('/news', NewsController::class);
    Route::get('/download/file/{id}', [DownloadController::class, 'download'])->name('download.download');
    Route::resource('/download', DownloadController::class);
});



Route::middleware(['guest:web'])->group(function () {
    /**
     * register routes for notices
     * 
     * 
     */
    Route::resource('notices', NoticeController::class)->only([
        'index', 'show'
    ]);
    Route::get('/notices/{notice}/download', [NoticeController::class, 'download'])->name('notice.download');

    /**
     * register routes for events
     * 
     * 
     */
    Route::resource('events', EventController::class)->only([
        'index', 'show'
    ]);
});

/**
 * User access routes here
 * 
 * 
 */

Route::middleware(['auth:web'])->group(function () {
    Route::resource('events', EventController::class);
});

/**
 * Admin access routes here
 * 
 * 
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::resource('notices', NoticeController::class);
        Route::resource('events', EventController::class);
    });
});

require __DIR__ . '/auth.php';
