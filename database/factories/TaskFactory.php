<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create('ja_JP');
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->optional()->sentence(),
            'completed' => $this->faker->boolean(30), // 30%が完了済み
        ];
    }
}
