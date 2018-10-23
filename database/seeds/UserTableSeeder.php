<?php

use App\User;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createUsers = [
                [
                    'username' => 'salman',
                    'first_name' => 'Salman',
                    'last_name' => 'Hider',
                    'email' => 'owner@gmail.com',
                    'password' => Hash::make('123456'),
                    'user_type' => 1

                ],

                [
                    'username' => 'hider',
                    'first_name' => 'Shaheen',
                    'last_name' => 'Hider',
                    'email' => 'super.admin@gmail.com',
                    'password' => Hash::make('123456'),
                    'user_type' => 1,

                ],
            ];
        foreach ($createUsers as $user){
            DB::table('users')->where('users.email',$user['email'])->delete();
            $blank = DB::table('users')->where('users.email',$user['email'])->get();
            if($blank == '[]')
            User::create($user);
        }

    }
}
