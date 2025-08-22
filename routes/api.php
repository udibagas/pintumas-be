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
        'announcement' => AnnouncementController::class,
        'app' => AppController::class,
        'attachment' => AttachmentController::class,
        'comment' => CommentController::class,
        'department' => DepartmentController::class,
        'post' => PostController::class,
        'regulation' => RegulationController::class,
        'service' => ServiceContainer::class,
        'supplyChain' => SupplyChainController::class,
        'tag' => TagController::class,
        'user' => UserController::class,
    ]);

    Route::middleware('role:ADMIN')->group(function () {
        // admin only
    });

    Route::middleware('role:MODERATOR')->group(function () {
        // moderator only
    });
});
