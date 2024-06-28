<?php

namespace App\Imports;

use App\Imports\NstpEnrollmentSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StudentsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'NSTP Enrollment List' => new NstpEnrollmentSheetImport(),
        ];
    }
}
