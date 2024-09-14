<?php
namespace Database\Factories;

use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    protected $model = Direccion::class;

    public function definition()
    {
        return [
            'direccion' => $this->faker->address,
            'ciudad' => $this->faker->city,
            'estado' => $this->faker->state,
            'pais' => $this->faker->country,
            'codigo_postal' => $this->faker->postcode,
        ];
    }
}
