<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
    ],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('purchaserequest', 'PurchaseRequestCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('city', 'CityCrudController');
    Route::crud('user', 'UserCrudController');
}); // this should be the absolute last line of this file
