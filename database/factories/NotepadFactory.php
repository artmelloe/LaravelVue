<?php

namespace Database\Factories;

use App\Models\Notepad;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotepadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notepad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph()
        ];
    }
}
