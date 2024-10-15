<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::get("/create/token", function () {
    $user = \App\Models\User::query()->create(['name' => 'test', 'email' => 'test', 'password' => Hash::make('test')]);
    $token=$user->createToken('test')->plainTextToken;
    return response()->json(['token' => $token]);
});

Route::get("/user", function (Request $request) {
    return $request->user();
})->middleware("auth:sanctum");
