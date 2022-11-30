<?php

namespace Database\Factories;

use App\Models\BookItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string|null
     */
    protected $model = BookItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bookTitle = $this->faker->sentence(3);
        $bookTitle = substr($bookTitle, 0, strlen($bookTitle) - 1);

        return [
            'name' => $bookTitle,
            'author' => $this->faker->name(),
            'status' => $this->faker->numberBetween(0,1)
        ];
    }
}
