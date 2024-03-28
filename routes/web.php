<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page');
});
Route::get('/about', function () {
    return view('about');
});

/* User */
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

/* Account */
Route::get('/account', [UserController::class, 'account']);

/* WorkSpaces */
Route::get('/workspaces', [WorkspaceController::class, 'index'])->name('workspaces.index');
Route::get('/workspaces/view/{code}', [WorkspaceController::class, 'show'])->name('workspaces.show');

Route::get('/workspaces/new', [WorkspaceController::class, 'create']);
Route::post('/workspace/new', [WorkspaceController::class, 'store']);

Route::post('/workspace/join', [WorkspaceController::class, 'userJoinToWorkspace']);
