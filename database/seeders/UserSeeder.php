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
        $admin = User::create([
            'first_name' => 'ali',
            'last_name' => 'ahmad',
            'email' => 'ali@admin1.com',
            'password' => Hash::make('123456789'),
            'phone' => '00971789456',
            'type' => UserTypeEnum::admin,
            'is_active' => 1,
        ]);

        $admin->assignRole('admin');
    }
}
