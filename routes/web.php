<?php

use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/upload-record", function(){
    return view("uploade-file");
});

Route::post("/upload", [SaleController::class, "upload"]);
Route::get("/batch", [SaleController::class, "batch"]);