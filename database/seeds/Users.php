<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\User::create([
            'name'=>'aboali',
            'email'=>'aboaliabdelnaby@gmail.com',
            'password'=>bcrypt('12345678'),
            'group'=>'admin'
        ]);
    }
}
