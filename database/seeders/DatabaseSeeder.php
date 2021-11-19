<?php

namespace Database\Seeders;


use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([UserSeeder::class]);
        Member::factory(10)->create();
        Book::factory(20)->create();
        Loan::factory(30)->create();
    }
}
