<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\NewsStandardController;

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

Route::get('/welcome', function () {

    return view('welcome');
});

Route::get('/', [NewsController::class, 'index'])->name('home');

// Voir une news
Route::get('/news/{id}', [NewsController::class, 'show'])->name('show');

/**************************** affichage des news pour le client ********************************/
Route::get('/standard', [NewsStandardController::class, 'standard'])->name('news.standard');
Route::get('/standardDetail/{actu}', [NewsStandardController::class, 'detail'])->name('news.standardDetail');
Route::get('/standard/category/{id}', [NewsStandardController::class, 'standard'])->name('news.category');
/**************************** /affichage des news pour le client ********************************/

Route::get('/secure', function () {
    return view('secure');
})->middleware(['auth']); // Route sécuriser grace à mon middleware 'auth'

Route::get('/notsecure', function () {
    return view('notsecure');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**Route sécurisée pour la gestion des news */
Route::middleware('auth', 'can:admin')->group(function () {
    // Lister mes news
    Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('adminList');

    // Ajouter des news
    Route::get('/admin/news/add', [AdminNewsController::class, 'formAdd'])->name('news.add');
    Route::post('/admin/news/add', [AdminNewsController::class, 'add'])->name('news.add');

    // modifier des news
    Route::get('/admin/news/edit/{id}', [AdminNewsController::class, 'formEdit'])->name('news.edit');
    Route::post('/admin/news/edit/{id}', [AdminNewsController::class, 'edit'])->name('news.edit');

    // Voir une news
    Route::get('/admin/news/{id}', [AdminNewsController::class, 'show'])->name('adminShow');

    // Supprimer une news
    Route::get('/admin/news/delete/{id}', [AdminNewsController::class, 'delete'])->name('news.delete');
});


require __DIR__ . '/auth.php';
