<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => $this->faker->sentence,
            'address' => $this->faker->address,
            'price' => $this->faker->numberBetween(100, 1000),
            'rooms' => $this->faker->numberBetween(1, 5),
            'users_id' =>User::factory(),
            'branches_id' => Branch::factory(),
            'statuses_id' => Status::factory(),
            'description' => $this->faker->paragraph,

        ];
    }

    }
