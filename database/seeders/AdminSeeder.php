<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'email' => 'admin@coinshape.com',
            'password' => Hash::make('password'),
            'first_name' => 'coin',
            'last_name' => 'shape',
            'role' => 'admin'
        ]);
    }
}
