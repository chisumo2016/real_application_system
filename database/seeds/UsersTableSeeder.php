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
       $user = App\User::create([
            'name'      => 'jumbura juma',
            'email'     => 'jumbura@gmail.com',
            'password'  =>  bcrypt('password'),
            'admin'     =>  1

        ]);

        // Profile for the above use
        $user = App\Profile::create([
            'user_id' => $user->id,
            'avatar'  =>'uploads/avatars/1.png',
            'about'   =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis cupiditate harum maiores, neque porro voluptatibus. Accusantium architecto deleniti, ea exercitationem harum magni minima non perferendis porro quas repudiandae sint voluptas.',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube'
        ]);
    }
}
