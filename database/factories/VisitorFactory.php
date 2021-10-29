<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visitor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ip_address' => $this->faker->ipv4,
            'country' => $this->faker->country,
            'user_agent' => $this->faker->userAgent,
            'page_url' => '/' . $this->faker->word . '/' . $this->faker->word,
            'created_at' => now()->subDays(rand(30, 365))
                ->setHour(rand(0, 23))
                ->setMinute(rand(0, 59))
                ->setSecond(rand(0, 59)),
        ];
    }
}
