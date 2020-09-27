<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Seeder;

class FinanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Loan::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Loan::create([
                'email' => $faker->email,
                'loanAmount' => $faker->numberBetween(15000, 100000),
                'loanTerm' => $faker->numberBetween(1, 9),
            ]);
        }

    }
}
