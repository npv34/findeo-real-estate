<?php

use App\Http\Controllers\RoleConstant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->username = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123456');
        $user->role = RoleConstant::ADMIN;
        $user->save();

        $user = new \App\User();
        $user->username = 'luan';
        $user->email = 'luan@gmail.com';
        $user->password = Hash::make('1234567');
        $user->role = RoleConstant::USER;
        $user->save();
    }
}
