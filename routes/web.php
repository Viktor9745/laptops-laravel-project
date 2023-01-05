<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\CategoryController;
use App\Http\Controllers\Adm\RoleController;

Route::get('/', function (){
    return redirect()->route('laptops.index');
});

// Route::get('adm/roles/create', [RoleController::class,'create'])->name('adm.roles.create');
// Route::post('adm/roles', [RoleController::class,'store'])->name('adm.roles.store');
// Route::get('adm/roles', [RoleController::class, 'index'])->name('adm.roles.index');
// Route::get('adm/roles/search', [RoleController::class, 'index'])->name('adm.roles.search');
// Route::put('adm/roles/{role}', [RoleController::class, 'update'])->name('adm.roles.update');
// Route::get('adm/roles/{role}/edit', [RoleController::class, 'edit'])->name('adm.roles.edit');
// Route::delete('adm/roles/{role}',[RoleController::class, 'destroy'])->name('adm.roles.destroy');

Route::middleware('auth')->group(function(){
    Route::post('/laptops/{laptop}/addcart', [LaptopController::class, 'addcart'])->name('laptops.addcart');
    Route::post('/laptops/{laptop}/uncart', [LaptopController::class, 'uncart'])->name('laptops.uncart');
    Route::get('/laptops/cart', [laptopController::class,'cart'])->name('laptops.cart');
    Route::get('/laptops/create', [LaptopController::class,'create'])->name('laptops.create');
    Route::post('/laptops', [LaptopController::class,'store'])->name('laptops.store');
    Route::match(['put', 'patch'],'/laptops/{laptop}',[LaptopController::class, 'update'])->name('laptops.update');
    Route::delete('/laptops/{laptop}',[LaptopController::class, 'destroy'])->name('laptops.destroy');
    Route::get('/laptops/{laptop}/edit',[LaptopController::class, 'edit'])->name('laptops.edit');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin')->group(function(){
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}',[UserController::class, 'update'])->name('users.update');
        Route::put('/users/{user}/ban', [UserController::class,'ban'])->name('users.ban');
        Route::put('/users/{user}/unban', [UserController::class,'unban'])->name('users.unban');
        Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/roles/create', [RoleController::class,'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class,'store'])->name('roles.store');
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/search', [RoleController::class, 'index'])->name('roles.search');
        Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::delete('/roles/{role}',[RoleController::class, 'destroy'])->name('roles.destroy');
    });

    Route::prefix('adm')->as('adm.')->middleware('hasrole:moderator')->group(function(){
        Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/search', [CategoryController::class, 'index'])->name('categories.search');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::delete('/categories/{category}',[CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    Route::resource('/comments', CommentController::class)->only('store', 'destroy','update');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/laptops', [LaptopController::class,'index'])->name('laptops.index');

Route::get('/laptop/{laptop}', [LaptopController::class, 'show'])->name('laptops.show');
Route::get('laptops/category/{category}', [LaptopController::class, 'laptopsByCategory'])->name('laptops.category');
//Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
