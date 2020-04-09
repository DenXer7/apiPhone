<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('providers', 'Provider\ProviderController', ['except' => ['create', 'edit']]);

Route::resource('brands', 'Brand\BrandController', ['except' => ['create', 'edit']]);



