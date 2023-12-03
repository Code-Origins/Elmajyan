<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    //USERS //ROLES
    Route::get('/users/draw', [\App\Http\Controllers\Admin\UserController::class, 'draw'])->name('admin.user.draw');
    Route::get('/users/export/all', [\App\Http\Controllers\Admin\UserController::class, 'exportAll'])->name('admin.users.export.all');
    Route::get('/users/search', [\App\Http\Controllers\Admin\UserController::class, 'search'])->name('admin.users.search');
    Route::get('/users/general-news', [\App\Http\Controllers\Admin\UserController::class, 'generalNews'])->name('users.generalNews');
    Route::post('/users/general-news', [\App\Http\Controllers\Admin\UserController::class, 'generalNewsStore'])->name('users.generalNews.store');
    Route::get('/users/list', [\App\Http\Controllers\Admin\UserController::class, 'getUsers'])->name('admin.users.search-all');
    Route::any('/users/bulk-actions', [\App\Http\Controllers\Admin\UserController::class, 'bulkActions']);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('/roles/draw', [\App\Http\Controllers\Admin\RoleController::class, 'draw'])->name('admin.role.draw');
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::get('/logout', [\App\Http\Controllers\Admin\UserController::class, 'logout'])->name('admin.user.logout');


    //Settings
    Route::get('settings/general', function () {
        return view('admin.settings.general');
    })->name('settings.general');
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);

    //ATTACHMENTS
    Route::resource('attachments', \App\Http\Controllers\Admin\AttachmentController::class);

    //MEDIA
    Route::post('/upload-file', [\App\Http\Controllers\Admin\MediaController::class, 'uploadFile'])->name('media.uploadFile');

    // SLIDERS
    Route::get('/sliders/draw', [\App\Http\Controllers\Admin\SliderController::class, 'draw'])->name('admin.sliders.draw');
    Route::post('/sliders/bulk-actions', [\App\Http\Controllers\Admin\SliderController::class, 'bulkActions']);
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
});
