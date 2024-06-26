<?php

namespace App\Http\Controllers;

use App\Models\Student;

use function Spatie\LaravelPdf\Support\pdf;

class CertificateController extends Controller
{
    public function download(Student $student)
    {
        return pdf()
            ->view('pdf.certificate', compact('student'))
            ->name('invoice-2023-04-10.pdf')
            ->download();
    }
}
