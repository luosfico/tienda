<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name'=>'Agostini',
        ]);
        DB::table('brands')->insert([
            'name'=>'Dilwe',
        ]);
        DB::table('brands')->insert([
            'name'=>'Hohner',
        ]);
        DB::table('brands')->insert([
            'name'=>'Kiddire',
        ]);
        DB::table('brands')->insert([
            'name'=>'Luis',
        ]);
    }
}
