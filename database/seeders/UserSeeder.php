<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password'=>bcrypt(123456),
                'remember_token'=>'',
            ],
            [
                'name' => 'Thành Đạt',
                'email' => 'datdeptrai@gmail.com',
                'password'=>bcrypt(123456),
                'remember_token'=>'',
            ],
            [
                'name' => 'Ngọc Long',
                'email' => 'longdeptrai@gmail.com',
                'password'=>bcrypt(123456),
                'remember_token'=>'',
            ]
        ];
        DB::table('users')->delete();
        DB::table('users')->insert($users);
    }
}

