<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\SupplyChainController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\Architecture\Services\ServiceContainer;

Route::post('/token', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    return $request->user()->createToken('token')->plainTextToken;
});

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResources([
        'app' => AppController::class,
        'department' => DepartmentController::class,
        'user' => UserController::class,
        'service' => ServiceContainer::class,
        'tag' => TagController::class,
        'regulation' => RegulationController::class,
        'post' => PostController::class,
        'attachment' => AttachmentController::class,
        'comment' => CommentController::class,
        'announcement' => AnnouncementController::class,
        'supplyChain' => SupplyChainController::class
    ]);

    Route::middleware('role:ADMIN')->group(function () {
        // admin only
    });

    Route::middleware('role:MODERATOR')->group(function () {
        // moderator only
    });
});
