<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeding Defaulf Adminstrator]]
        App\User::create([
            'name'      => 'jumbura juma',
            'email'     => 'jumbura@gmail.com',
            'password'  =>  bcrypt('password')

        ]);
    }
}
