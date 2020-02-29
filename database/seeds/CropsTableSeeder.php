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
            [
                'crop_name'=>'Corn',
                'duration'=> 2592000,
                'img-url'=>'https://lh3.googleusercontent.com/proxy/An6ucSPfkShGkXgoUHaUZYqZOJ07_1KW82LdJLuYD66Ll2sE3sxMRMF0C7OBGvNSkUhJNWdmC-8p2MJQzFmcrXBTSiew1teiVn6wZJZd5NkPPJWmUZWxjcDWfNzprEqSBSIe'
            ],
            [
                'crop_name'=>'Wheat',
                'duration'=> 3888000,
                'img-url'=>'https://lh3.googleusercontent.com/proxy/Vqg9yvX1hg2300P6LuxiXB-2lsGMlhyUo_Ak3lLbSZz7xkwDvJIDMuliUM-vr2Alcsifb0STAMlXBtM2XxC3JLs7w13DYvZwgiSFG5NVPv9bASCOnkY'
            ],
            [
                'crop_name'=>'Cabbage',
                'duration'=> 3888000,
                'img-url'=>'https://purepng.com/public/uploads/medium/purepng.com-cabbagecabbageplantvegetablesgreen-1701527241612ushwz.png'
            ],
            [
                'crop_name'=>'Test Schedule',
                'duration'=> 254200,
                'img-url'=>null
            ]
        ]);
    }
}
