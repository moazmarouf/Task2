<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

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
            'name' => 'Moaz Marouf',
            'email' => 'moazmarouf444@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
