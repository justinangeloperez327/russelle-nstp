<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'middle_name',
        'extension_name',

        'sex',
        'birthdate',
        'email',

        'user_id',
        'course_id',
        'year_level',

        'phone',

        'region',
        'province',
        'city',
        'brgy',

        'hei_name',
        'hei_type',

        'enrollment_status',
        'enrollment_type',
        'enrollment_year',

        'nstp_serial_no',

    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} {$this->extension_name} {$this->middle_name}";
    }
}
