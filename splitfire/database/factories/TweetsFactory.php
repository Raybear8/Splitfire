<?php

namespace Database\Factories;

use App\Models\Tweets;
use Illuminate\Database\Eloquent\Factories\Factory;

//Factory de tags pour créer des faux tweets
class TweetsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweets::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'auteur' => $this->faker->name,
            'message' => $this->faker->text
        ];
    }
}
