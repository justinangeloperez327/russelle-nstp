<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DownloadCertificateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UploadStudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('certificates/{student}', DownloadCertificateController::class)->name('certificates.download');
    Route::resource('courses', CourseController::class);

    Route::post('students/import', [UploadStudentController::class, 'import'])->name('students.import');
    Route::get('students/upload', [UploadStudentController::class, 'create'])->name('students.upload-form');

    Route::resource('students', StudentController::class);

});

require __DIR__.'/auth.php';
