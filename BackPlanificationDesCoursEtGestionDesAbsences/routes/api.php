<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionDeCoursController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("modules", ModuleController::class);
Route::apiResource("cours", CoursController::class);
Route::apiResource("sessions", SessionDeCoursController::class);

Route::group([
                'prefix' => 'services',
            ], function () {
                Route::get('modules', [ServiceController::class, 'module']);
            }
);

