<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Provider
Route::resource('providers', 'Provider\ProviderController', ['except' => ['create', 'edit']]);

// Brand
Route::resource('brands', 'Brand\BrandController', ['except' => ['create', 'edit']]);

// ModelProduct
Route::resource('models', 'ModelProduct\ModelProductController', ['except' => ['create', 'edit']]);

// Client
Route::resource('clients', 'Client\ClientController', ['except' => ['create', 'edit']]);

// Maintenance
Route::resource('maintenances', 'Maintenance\MaintenanceController', ['except' => ['create', 'edit']]);

