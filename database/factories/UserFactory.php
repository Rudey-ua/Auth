<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;

    public function definition()
    {
        return [
            'name'=> $this->faker->firstName,
            'login' => $this->faker->userName,
            'email' => $this->faker->email,
            'dob' => $this->faker->date(),
            'password' => $this->faker->password,
            'img_src' => 'https://cdn-icons-png.flaticon.com/512/149/149071.png',
        ];
    }
}
