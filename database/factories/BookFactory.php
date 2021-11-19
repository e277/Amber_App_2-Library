<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'member_id' => Member::all()->random()->id,
            'title' => $this->faker->word(),
            'author' => $this->faker->name,
            'isbn' => $this->faker->numerify('###-#-##-#####-#'),
            'publication_date' => $this->faker->date(),
            'amount_owned' => $this->faker->numerify('##')
        ];
    }
}
