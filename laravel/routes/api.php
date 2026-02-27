<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Product API Routes
Route::get('/products', [ProductController::class, 'index']); // Get all products
Route::get('/products/{id}', [ProductController::class, 'show']); // Get single product
Route::get('/test-db-env', function () {
    return response()->json([
        'status' => 'success',
        'data_dari_os' => [
            'DB_PASSWORD_GETENV' => getenv('DB_PASSWORD'),
            'DB_PASSWORD_SERVER' => $_SERVER['DB_PASSWORD'] ?? 'tidak ada di $_SERVER',
        ],
        'data_dari_laravel_config' => [
            'DB_PASSWORD_CONFIG' => config('database.connections.mysql.password'),
        ],
        'pesan' => 'Jika data_dari_os kosong tapi terminal bisa, berarti Docker/PHP-FPM memblokir variabel tersebut.'
    ]);
});
Route::get('/debug-cli', function () {
    return [
        'all_env' => getenv(), // Ini akan menampilkan SEMUA variabel yang terbaca oleh PHP
        'db_pass' => getenv('DB_PASSWORD'),
    ];
});
