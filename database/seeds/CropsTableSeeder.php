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
                'crop_name'=>'Maize',
                'duration'=> 2592000,
                'img-url'=>'https://lh3.googleusercontent.com/proxy/An6ucSPfkShGkXgoUHaUZYqZOJ07_1KW82LdJLuYD66Ll2sE3sxMRMF0C7OBGvNSkUhJNWdmC-8p2MJQzFmcrXBTSiew1teiVn6wZJZd5NkPPJWmUZWxjcDWfNzprEqSBSIe'
            ],
            [
                'crop_name'=>'Test Schedule',
                'duration'=> 254200,
                'img-url'=>null
            ]
        ]);
    }
}
