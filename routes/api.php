<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Регистрация
Route::post('/register', [AuthController::class, 'singIn']);
// Авторизация
Route::post('/auth', [AuthController::class, 'login']);

// Просмотр всех категорий
Route::get('/categories', [CategoryController::class, 'index']);

// Просмотр всех товаров
Route::get('/products', [ProductController::class, 'index']);
// Просмотр всех товаров по категории
Route::get('/products/category/{id}', [ProductController::class, 'showByCategory']);

// Роуты для авторизированных пользователей
Route::middleware('auth:api')->group(function () {
    // Выход
    Route::get('/logout', [AuthController::class, 'logout']);

    // ПРОФИЛЬ
    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'profile']);
    // Редактирование профиля пользователя
    Route::patch('/profile', [ProfileController::class, 'update']);
});

// Функционал админа
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    // РОЛЬ
    // Просмотр всех ролей
    Route::get('/roles', [RoleController::class, 'index']);
    // Добавление роли
    Route::post('/roles', [RoleController::class, 'create']);
    // Редактирование роли
    Route::patch('/roles/{id}', [RoleController::class, 'update']);
    // Удаление роли
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']);

    // ПОЛЬЗОВАТЕЛЬ
    // Просмотр всех пользователей
    Route::get('/users', [UserController::class, 'index']);
    // Просмотр пользователя
    Route::get('/users/{id}', [UserController::class, 'show']);
    // Редактирование пользователя
    Route::patch('/users/{id}', [UserController::class, 'update']);
    // Удаление пользователя
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // КАТЕГОРИЯ
    // Добавление категории
    Route::post('/categories', [CategoryController::class, 'create']);
    // Редактирование категории
    Route::patch('/categories/{id}', [CategoryController::class, 'update']);
    // Удаление категории
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    // ТОВАР
    // Добавление товара
    Route::post('/products', [ProductController::class, 'create']);
    // Редактирование товара
    Route::patch('/products/{id}', [ProductController::class, 'update']);
    // Удаление товара
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});




