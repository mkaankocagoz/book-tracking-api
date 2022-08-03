<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        for ($i=1; $i<=5; $i++) {
            User::create([
                'name' => 'user '.$i,
                'phone' => '123456',
                'email' => 'user_'.$i.'@user.com',
                'password' => Hash::make("123456"),
            ]);
        }
        User::create([
            'name' => 'admin',
            'phone' => '123456',
            'email' => 'admin@admin.com',
            'password' => Hash::make("123456"),
            'is_admin' => 1,
        ]);
    }
}
