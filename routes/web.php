<?php

use Illuminate\Support\Facades\Route;

// Backend Routes

require_once __DIR__ . '/backend/authentication.php';

Route::group(['prefix' => 'sadmin', 'middleware' => ['auth:admin', 'admin'], 'namespace' => 'Backend'], function () {
    // Dashboard
    require_once __DIR__ . '/backend/dashboard.php';

    // area_division
    require_once __DIR__ . '/backend/area_division.php';

    // Site Config
    require_once __DIR__ . '/backend/site_config.php';

    // Product
    require_once __DIR__ . '/backend/item.php';

    // Customer
    require_once __DIR__ . '/backend/customer.php';

    // Order
    require_once __DIR__ . '/backend/order.php';

    // Purchase
    require_once __DIR__ . '/backend/purchase.php';
});





// Frontend Routes

require_once __DIR__ . '/frontend/home.php';
