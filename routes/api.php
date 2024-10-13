<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommetController;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\AuthenticationController;

Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);


Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('pemilik-postingan');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('pemilik-postingan');
    Route::post('/comment', [CommetController::class, 'store']);
    Route::patch('/comment/{id}', [CommetController::class, 'update'])->middleware('pemilik-komentar');
    Route::delete('/comment/{id}', [CommetController::class, 'destroy'])->middleware('pemilik-komentar');
});