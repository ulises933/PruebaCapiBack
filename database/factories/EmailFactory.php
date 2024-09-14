<?php
namespace Database\Factories;

use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    protected $model = Email::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'tipo' => $this->faker->randomElement(['Personal', 'Trabajo']),
        ];
    }
}
