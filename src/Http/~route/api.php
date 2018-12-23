<?php
declare(strict_types = 1);

use App\Http\Controller\RoomScheduleController;
use App\Http\Controller\RoomSearchController;
use App\Http\Controller\TeacherScheduleController;
use App\Http\Controller\TeacherSearchController;
use Illuminate\Support\Facades\Route;

Route::get('teacher-search', TeacherSearchController::class)->name('teacher-search');
Route::get('teacher-schedule/{teacher}', TeacherScheduleController::class)->where('teacher', '[0-9]+');

Route::get('room-search', RoomSearchController::class);
Route::get('room-schedule/{room}', RoomScheduleController::class)->where('room', '[0-9]+');
