<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Project;


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
    public function definition()
    {
        return [
            'name'=> $this->faker->word(),
            'description'=> $this->faker->paragraph(),
            'priority'=> $this->faker->numerify('#'),
            'category_id'=> Category::factory(),
            'project_id'=> Project::factory()
        ];
    }
}
