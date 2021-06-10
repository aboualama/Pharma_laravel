<?php

namespace Database\Seeders;

use App\Models\Pharma;
use Illuminate\Database\Seeder;

class PharmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $rows = 10000;

        $range = range( 1, $rows );
        $chunksize = 100;

        foreach( array_chunk( $range, $chunksize ) as $chunk ){
            $data = [];
            foreach( $chunk as $i ){
                $data[] = [
                    'patientId' => $faker->randomDigit,
                    'patientName' => $faker->name,
                    'patientLastName' => $faker->name,
                    'cf' => $faker->randomDigit,
                    'medicine' => $faker->word,
                    'aifaCode' => $faker->randomDigit,
                    'quantity' => $faker->randomDigit,
                    'unit' => $faker->randomDigit,
                    'doctor' => $faker->sentence,

                ];
            }
            Pharma::insert( $data );
        }

    }
}
