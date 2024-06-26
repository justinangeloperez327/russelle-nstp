<?php

namespace App\Http\Controllers;

use App\HeiType;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Course;
use App\Models\Student;
use App\NstpType;
use App\StudentStatus;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::query();

        // Example filter by course
        if ($request->course_id !== null) {
            $query->where('course_id', $request->course_id);
        }

        if ($request->enrollment_type !== null) {
            $query->where('enrollment_type', $request->enrollment_type);
        }

        if ($request->enrollment_year !== null) {
            $query->where('enrollment_type', $request->enrollment_year);
        }

        if($request->search != null) {
            $query->whereAny([
                'last_name',
                'middle_name',
                'first_name',
            ], 'LIKE', '%'.$request->search.'%');
        }
        // Add more filters as needed
        $students = $query->orderBy('last_name')->get();

        $courses = Course::query()
            ->orderBy('name')
            ->get();

        $nstpTypes = NstpType::cases();

        $graduationYears = [];
        $startYear = 2023;
        $currentYear = date('Y');
        for ($year = $startYear; $year <= $currentYear; $year++) {
            $graduationYears[] = $year.'/'.($year + 1);
        }

        return view('students.index', [
            'students' => $students,
            'courses' => $courses,
            'nstpTypes' => $nstpTypes,
            'graduationYears' => $graduationYears,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::query()
            ->orderBy('name')
            ->get();

        $studentStatus = StudentStatus::cases();
        $nstpTypes = NstpType::cases();
        $heiTypes = HeiType::cases();

        $graduationYears = [];
        $startYear = 2023;
        $currentYear = date('Y');
        for ($year = $startYear; $year <= $currentYear; $year++) {
            $graduationYears[] = $year.'/'.($year + 1);
        }

        return view('students.create', [
            'courses' => $courses,
            'studentStatus' => $studentStatus,
            'nstpTypes' => $nstpTypes,
            'heiTypes' => $heiTypes,
            'graduationYears' => $graduationYears,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', [
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::query()
            ->orderBy('name')
            ->get();

        $studentStatus = StudentStatus::cases();
        $nstpTypes = NstpType::cases();
        $heiTypes = HeiType::cases();

        $graduationYears = [];
        $startYear = 2023;
        $currentYear = date('Y');
        for ($year = $startYear; $year <= $currentYear; $year++) {
            $graduationYears[] = $year.'/'.($year + 1);
        }

        return view('students.edit', [
            'student' => $student,
            'courses' => $courses,
            'studentStatus' => $studentStatus,
            'nstpTypes' => $nstpTypes,
            'heiTypes' => $heiTypes,
            'graduationYears' => $graduationYears,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
