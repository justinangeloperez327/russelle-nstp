<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'middle_name' => $this->faker->lastName,
            'course_id' => $this->faker->numberBetween(1, 7),
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'birthdate' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'hei_name' => 'University of the Philippines',
            'hei_type' => $this->faker->randomElement(['Public', 'Private']),
            'province' => $this->faker->state,
            'city' => $this->faker->city,
            'brgy' => $this->faker->streetName,
            'enrollment_status' => $this->faker->randomElement(['Enrolled', 'Dropped', 'Graduated']),
            'enrollment_year' => $this->faker->numberBetween(2023, 2030),
            'enrollment_type' => $this->faker->randomElement(['CWTS', 'ROTC', 'LTS']),
            'nstp_serial_no' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
        ];
    }
}
