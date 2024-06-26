<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'student_id' => 'required|string',

            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'extension_name' => 'nullable|string',

            'sex' => 'required|string',
            'birthdate' => 'required',

            'email' => 'required|email',
            'phone' => 'required|string',

            'course_id' => 'required|integer',

            'region' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'brgy' => 'required|string',


            'enrollment_type' => 'required|string',
            'enrollment_year' => 'required|string',

            'nstp_serial_no' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => 'Student ID is required',
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'middle_name.required' => 'Middle name is required',
            'coures_id.required' => 'Course is required',
            'nstp_serial_no.required' => 'NSTP Serial No. is required',
            'enrollment_type.required' => 'NSTP type is required',
            'enrollment_year.required' => 'Graduation year is required',
            'birthdate.required' => 'Birthdate is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
            'region.required' => 'Region is required',
            'province.required' => 'Province is required',
            'city.required' => 'City is required',
            'brgy.required' => 'Barangay is required',
        ];
    }
}
