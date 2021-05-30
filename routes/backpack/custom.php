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
], function () {
    //Manager routes
    Route::group([
        'middleware' => ['checkIfManager']
    ], function () {
        Route::crud('user', 'UserCrudController');
    });
    //Aquisition section
    Route::crud('purchaserequest', 'PurchaseRequestCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('city', 'CityCrudController');
    //News section
    Route::crud('news', 'NewsCrudController');
    Route::crud('description', 'DescriptionCrudController');
    Route::crud('aboutfile', 'AboutFileCrudController');
    Route::crud('landingpage', 'LandingPageCrudController');
});