<?php
declare(strict_types = 1);

use App\Http\Controller\TeacherScheduleController;
use App\Http\Controller\TeacherSearchController;
use Illuminate\Support\Facades\Route;

Route::get('teacher-search', TeacherSearchController::class);
Route::get('teacher-schedule/{teacher}', TeacherScheduleController::class)->where('teacher', '[0-9]+');
