<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\KudoBoardController;
use App\Http\Controllers\Backend\CategorieController;
use App\Http\Controllers\Backend\InvitationController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\KudoCardController;

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
Route::apiResource('kudo_boards',KudoBoardController::class);
Route::apiResource('categorie',CategorieController::class);
Route::apiResource('invitation',InvitationController::class);
Route::apiResource('comment',CommentController::class);
Route::apiResource('kudo_cards',KudoCardController::class);

Route::get('/getKudos/{id}', [KudoBoardController::class, 'getKudos'])->name('getKudos');
Route::get('/getKudosByBoard/{id}', [KudoCardController::class, 'getKudos'])->name('getKudos');