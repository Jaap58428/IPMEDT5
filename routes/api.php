<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| This is where CatchTTN send its requests.
| The Request is send to its action in MeasurementController
|
*/

// Create new measurement
Route::post('measurement', 'MeasurementController@store');
