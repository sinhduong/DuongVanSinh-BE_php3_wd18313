<?php


use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', function () {
    // Truy vấn lấy tất cả dữ liệu
    $data = Post::all()->toArray();
    $data = Post::query()->get();
    // Truy vấn với điều kiện
    $data = Post::query()
        ->where('id', '>=', '1' )
        ->get();
});

Route::prefix('products')
->as('products.')
->group(function () {
    Route::get('/',                 [ProductController::class, 'index'])->name('index');
    Route::get('/create',           [ProductController::class, 'create'])->name('create');
    Route::post('/store',           [ProductController::class, 'store'])->name('store');
    Route::get('/show/{id}',        [ProductController::class, 'show'])->name('show');
    Route::get('{id}/edit',         [ProductController::class, 'edit'])->name('edit');
    Route::put('{id}/update',       [ProductController::class, 'update'])->name('update');
    Route::delete('{id}/destroy',   [ProductController::class, 'destroy'])->name('destroy');
});
