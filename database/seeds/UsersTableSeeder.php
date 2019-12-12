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
            'name'=>'yang',
            'email'=>'yang@mail.com',
            'password'=>bcrypt('yangyang'),
        ]);
    }
}
