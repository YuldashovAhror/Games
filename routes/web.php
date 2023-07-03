<?php

use App\Http\Controllers\Dashboard\AtributeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SecondSliderController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\SliderInstagramController;
use Illuminate\Support\Facades\Route;

//Localization
// Route::get('/ru', function () {
//     session()->put('locale', 'ru');
//     return redirect()->back();
// })->name('languages');
// Route::get('/uz', function () {
//         session()->put('locale', 'uz');
//         return redirect()->back();
// })->name('languages');

//Front
Route::get('/', [\App\Http\Controllers\Front\FrontController::class, 'index'])->name('main');

//Dashboard
Route::group(['prefix' => 'dashboard'], function (){
    Route::name('dashboard.')->group(function (){

        Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('index');
        Route::resource('/category', CategoryController::class);
        Route::resource('/feedback', FeedbackController::class);
        Route::resource('/instagramslider', SliderInstagramController::class);
        Route::resource('/secondslider', SecondSliderController::class);
        Route::resource('/slider', SliderController::class);
        Route::resource('/product', ProductController::class);
        Route::get('/product/{id}/atribute', [AtributeController::class, 'index'])->name('atribute.index');
        Route::post('/atribute', [AtributeController::class, 'store'])->name('atribute.store');
        Route::put('/atribute/{id}/update', [AtributeController::class, 'update'])->name('atribute.update');
        Route::delete('/atribute/{id}', [AtributeController::class, 'destroy'])->name('atribute.destroy');
    });
});


require __DIR__.'/auth.php';
