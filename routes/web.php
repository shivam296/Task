<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CronJobController;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('cron-jobs', CronJobController::class);

Route::get('/test-cron', function () {
    Log::info('Test cron job executed');
    return response()->json(['message' => 'Cron job executed']);
});