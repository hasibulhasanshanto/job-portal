<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'first_name' => 'Mr. Super',
            'last_name' => 'Admin', 
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('12345678'),

        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'first_name' => 'Mr. Admin',
            'last_name' => 'Normal',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),

        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'first_name' => 'Mr. Company',
            'last_name' => 'Limited', 
            'email' => 'company@company.com',
            'password' => Hash::make('12345678'),

        ]);

        DB::table('users')->insert([
            'role_id' => '4',
            'first_name' => 'Mr. User',
            'last_name' => 'Normal',
            'email' => 'user@user.com',
            'password' => Hash::make('12345678'),

        ]);
    }
}
