<?php

use Illuminate\Support\Facades\Route;

Route::post('cdv/check', 'CheckCdvController@validateCdv');