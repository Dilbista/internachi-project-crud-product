<?php
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\api\ProductlistController;

Route::apiResource('products',ProductlistController::class);
