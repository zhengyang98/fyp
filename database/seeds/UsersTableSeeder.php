<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str as IlluminateStr;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name'=>'Yang',
            'email'=>'yang123pro@hotmail.com',
            'password'=>bcrypt('yangyang'),
            'is_merchant' => '0',
            'lat' => null,
            'long' => null,
        ],
        [
            'name'=>'Merchant A',
            'email'=>'merchant@mail.com',
            'password'=>bcrypt('yangyang'),
            'is_merchant' => '1',
            'lat' => null,
            'long' => null,
        ]

    ]);
    }
}
