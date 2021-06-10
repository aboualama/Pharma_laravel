<?php

namespace Database\Factories;

use App\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Medicine extends Factory
{
    protected $model = \App\Models\Medicine::class;

    public function definition(): array
    {
        return [
            id => $this->faker->name
        ];
    }
}
