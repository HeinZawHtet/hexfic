<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusCollectionSeeder extends Seeder {

    public function run()
    {
        DB::table('status')->delete();

        $faker = \Faker\Factory::create();
        for ($count=0; $count < 8 ; $count++) {
            Status::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 3),
                'place_id' => $faker->numberBetween($min = 1, $max = 3),
                'status'  => $faker->numberBetween($min = 1000, $max = 1005),
                'comment' => $faker->sentences()
            ]);
        };

    }

}