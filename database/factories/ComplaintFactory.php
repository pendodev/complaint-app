<?php

namespace Database\Factories;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComplaintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Complaint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date'        => $this->faker->dateTime,
            'client_name' => $this->faker->name,
            'type'        => array_rand(array_flip(Complaint::TYPES), 1),
            'person'      => array_rand(array_flip(Complaint::PERSONS), 1),
            'job_title'   => array_rand(array_flip(Complaint::JOBS), 1),
            'author'      => $this->faker->name,
            'message'     => $this->faker->paragraph,
            'user_id'     => User::factory(),
        ];
    }
}
