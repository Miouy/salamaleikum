<?php

namespace Database\Factories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ManagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manager::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'manager_name' => $this->faker->firstName,
            'manager_surname' => $this->faker->lastName,
            'manager_email' => $this->faker->unique()->safeEmail,
            'manager_password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'manager_phone_num' => $this->faker->phoneNumber,
            'remember_token' => Str::random(10),
        ];
    }
}
