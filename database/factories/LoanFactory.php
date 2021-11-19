<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => Book::all()->random()->id,
            'member_id' => Member::all()->random()->id,
            'loan_date' => $this->faker->date(),
            'returned_date' => $this->faker->dateTimeBetween('loan_date', 'returned_date')
        ];
    }
}
