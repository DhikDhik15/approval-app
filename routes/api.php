<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ExpenseController;
use App\Http\Controllers\API\ApproverController;
use App\Http\Controllers\API\ApprovalStagesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/approvers', [ApproverController::class,'store']);
Route::post('/approval-stages', [ApprovalStagesController::class,'store']);
Route::put('/approval-stages/{id}', [ApprovalStagesController::class,'update']);
Route::post('/expense', [ExpenseController::class,'store']);
