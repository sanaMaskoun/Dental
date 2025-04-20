<?php

namespace Database\Seeders;

use App\Enums\TypeEnum;
use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin1 = User::create([
            'first_name' => 'sara',
            'last_name' => 'admin',
            'email' => 'sara@admin1.com',
            'password' => Hash::make('123456789'),
            'phone' => '00971789456',
            'type' => UserTypeEnum::admin,
            'is_active' => 1,
        ]);

        $admin1->assignRole('admin');

        $admin2 = User::create([
            'first_name' => 'tasnim',
            'last_name' => 'admin',
            'email' => 'tasnim@admin2.com',
            'password' => Hash::make('123456789'),
            'phone' => '00971789456',
            'type' => UserTypeEnum::admin,
            'is_active' => 1,
        ]);

        $admin2->assignRole('admin');
    }
}
