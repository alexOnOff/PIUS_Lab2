<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker = Faker::create('ru_RU');
        return [
            "name"=> $this->faker->text(20),
            "symbolcode" => $this->faker->randomLetter(),
            "content" => $this->faker->text(100),
            "create_time" => $this->faker->dateTimeBetween($staretDate = '-5 years', $endDate = 'now', $timezone = null),
            "author" => $this->faker->name(),
        ];
    }
}
