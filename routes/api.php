<?php

use Illuminate\Support\Facades\Route;

include 'api/front.php';

Route::prefix('admin')->group(function () {
    include 'api/admin.php';
});
