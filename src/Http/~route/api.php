<?php
declare(strict_types = 1);

use App\Http\Controller\TeacherSearchController;
use Illuminate\Support\Facades\Route;

Route::get('teacher-search', TeacherSearchController::class);
