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
                'location_id' => '5459b45a46771aa1378b4567',
                'status'  => $faker->numberBetween($min = 1000, $max = 1005),
                'comment' => $faker->text($maxNbChars = 100)
            ]);
            sleep('3');
        };

    }

}