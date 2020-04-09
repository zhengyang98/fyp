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
                'img-url'=>'https://pngimg.com/uploads/corn/corn_PNG5284.png'
            ],
            [
                'crop_name'=>'Wheat',
                'duration'=> 3888000,
                'img-url'=>'https://i.imgur.com/CIkOSs2.png'
            ],
            [
                'crop_name'=>'Cabbage',
                'duration'=> 3888000,
                'img-url'=>'https://purepng.com/public/uploads/medium/purepng.com-cabbagecabbageplantvegetablesgreen-1701527241612ushwz.png'
            ],
            [
                'crop_name'=>'Potato',
                'duration'=> 7776000,
                'img-url'=>'https://pngimg.com/uploads/potato/potato_PNG7082.png'
            ],
            [
                'crop_name'=>'Banana',
                'duration'=> 3888000,
                'img-url'=>'https://i.ya-webdesign.com/images/banana-tree-png.png'
            ],
            [
                'crop_name'=>'Test Crop',
                'duration'=> 254200,
                'img-url'=>'https://purepng.com/public/uploads/medium/purepng.com-cabbagecabbageplantvegetablesgreen-1701527241612ushwz.png'
            ],
            [
                'crop_name'=>'Test 2',
                'duration'=> 254200,
                'img-url'=>'https://purepng.com/public/uploads/medium/purepng.com-cabbagecabbageplantvegetablesgreen-1701527241612ushwz.png'
            ]
        ]);
    }
}
