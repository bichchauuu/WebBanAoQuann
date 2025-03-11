<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Roles::create(['name' => 'Admin']);
        Roles::create(['name' => 'Employee']);
        Roles::create(['name' => 'User']);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'phone' => '000000000000',
            'password' => Hash::make('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'role_id' => config('app.role.USER')
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '000000000000',
            'password' => Hash::make('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'role_id' => config('app.role.ADMIN')
        ]);

        Category::insert([
            ['name' => 'Áo Sơ mi',  'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Quần dài',  'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Quần short',  'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'Chân Váy',  'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
        ]);

        Promotion::create([
            'name' => 'Quốc tế phụ nữ',
            'percent' => 83,
            'start_date' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s'),
            'status' => config('app.status.ACTIVE'),
        ]);

    }
}
