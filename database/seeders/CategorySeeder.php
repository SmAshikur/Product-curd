<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rec=[
            ['cname'=>'Pro'],['cname'=>'Pro-Max'],['cname'=>'Pro-legend'],['cname'=>'max'],
            ['cname'=>'pro-Altra'],['cname'=>'Altra-max'],['cname'=>'Altra-legend'],['cname'=>'Lite'],
        ];
        Category::insert($rec);
    }
}
