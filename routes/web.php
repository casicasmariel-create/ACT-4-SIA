<?php

use App\Http\Controllers\FormController;

Route::get('/youth-form', [FormController::class, 'create']);
Route::post('/youth-form', [FormController::class, 'store']
);
