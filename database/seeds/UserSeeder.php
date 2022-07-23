<?php

use App\User;
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
        echo "Seeder user seeder dimulai ... ";
        echo "\n";
        echo "Create user admin master";
        echo "\n";

        // Admin Master
        $check_user = User::where(['email' => 'admin@yopmail.com'])->first();
        if (!$check_user) {
            $user = User::create(
                [
                    'name'  => 'Admin',
                    'email'  => 'admin@yopmail.com',
                    'password'  => Hash::make('aaa123'),
                ]
            );
            $user->assignRole('admin-master');
        } else {
            $check_user->name = 'Admin';
            $check_user->email = 'admin@yopmail.com';
            $check_user->save();
        }

        // User
        $check_user = User::where(['email' => 'user@yopmail.com'])->first();
        if (!$check_user) {
            $user = User::create(
                [
                    'name'  => 'User',
                    'email'  => 'user@yopmail.com',
                    'password'  => Hash::make('aaa123'),
                ]
            );
            $user->assignRole('users');
        } else {
            $check_user->name = 'User';
            $check_user->email = 'user@yopmail.com';
            $check_user->save();
        }

        echo "Proses seeder selesai. Terimakasih DevOps...";
        echo "\n";
    }
}
