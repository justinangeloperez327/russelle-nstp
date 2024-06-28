<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UploadStudentController extends Controller
{
    public function create()
    {
        return view('students.upload');
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'batch_student_file' => 'required|mimes:xlsx|max:10240',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            Log::info('File received: ' . $request->file('batch_student_file')->getClientOriginalName());

            Excel::import(new StudentsImport, $request->file('batch_student_file'));

            Log::info('File processed and saved successfully.');
            return redirect()->back()->with('success', 'Data imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to import data: ' . $e->getMessage());
        }
    }
}
