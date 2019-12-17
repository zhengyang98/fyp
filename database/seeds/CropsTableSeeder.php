<?php

use Illuminate\Database\Seeder;

class CropsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('crops')->insert([
            'crop_name'=>'Maize',
            'duration'=> 2592000,
        ]);
    }
}
