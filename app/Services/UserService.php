<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create(array $data): User
    {
        return User::create([
            'username' => $data['student_id'],
            'password' => Hash::make($data['student_id']),
            'role' => $data['role'] ?? 'student',
        ]);
    }
}
