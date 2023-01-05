<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(4),
            'book' => [rand(0, 3)],
            'year' => [fake()->numberBetween(2010, 2021)],
            'price' => [rand(100, 500)],
            'image' => [fake()->imageUrl()],
            'content' => fake()->paragraphs(2),
            'link' => [fake()->url()],
            'submited_by' => [User::all()->random()->id],
            'duration' => [rand(0, 3)],
            'platform_id' => [Platform::all()->random()->id]
        ];
    }
}
