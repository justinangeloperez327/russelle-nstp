<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use function Spatie\LaravelPdf\Support\pdf;

class DownloadCertificateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Student $student)
    {
        return pdf()
            ->view('pdf.certificate', compact('student'))
            ->name('invoice-2023-04-10.pdf')
            ->download();
    }
}
