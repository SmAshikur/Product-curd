<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rec=[
            'name'=>'S M Ashikur Rahman',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123demo')
        ];
        User::insert($rec);

    }
}
