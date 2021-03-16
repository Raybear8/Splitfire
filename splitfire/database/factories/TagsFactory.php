<?php

namespace Database\Factories;

use App\Models\Tags;
use Illuminate\Database\Eloquent\Factories\Factory;

//Factory de tags pour créer des faux tags
class TagsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tags::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag' => "#".$this->faker->name
        ];
    }
}
