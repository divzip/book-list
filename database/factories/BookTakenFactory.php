<?php

namespace Database\Factories;

use App\Models\BookTaken;
use App\Models\BookItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookTakenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string|null
     */
    protected $model = BookTaken::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_item_id' => BookItem::factory(),
            'taken_at' => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d H:m:s'),
        ];
    }
}
