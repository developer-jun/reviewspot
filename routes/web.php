<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
//use Illuminate\Foundation\Application;
use App\Models\Business;
use App\Http\Middleware\QueryStringHandler;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::middleware([QueryStringHandler::class])->group(function () {
    Route::controller(SearchController::class)->group(function () {
        Route::get('/search', 'index')->name('search.index');
        Route::post('/search', 'show')->name('search.show');
    });

    Route::controller(BusinessController::class)->group(function () {
        Route::get('/detail/{slug}', 'detail')->name('business.detail');
    });

    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
});


/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

/*
Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('/note/{id}', [NoteController::class, 'show'])->name('note.show');
Route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/note/{id}', [NoteController::class, 'update'])->name('note.update');
Route::delete('/note/{id}', [NoteController::class, 'destroy'])->name('note.destroy');
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('note', NoteController::class);

    // Route::resource('admin/business', BusinessController::class);

    Route::controller(BusinessController::class)->group(function () {
        Route::get('/admin/business', 'index')->name('business.index');
        Route::get('/admin/business/create', 'create')->name('business.create');
        Route::post('/admin/business', 'store')->name('business.store'); // no view needed
        Route::get('/admin/business/{id}', 'show')->name('business.show');
        Route::get('/admin/business/{id}/edit', 'edit')->name('business.edit');
        Route::post('/admin/business/{id}', 'update')->name('business.update');
        Route::delete('/admin/business/{id}', 'destroy')->name('business.destroy');
    });
});
Route::get('/note', function() {
    return 'Note';
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
