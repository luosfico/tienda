<?php

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
        DB::table('categories')->insert([
            'name'=>'Acordeones',
        ]);
        DB::table('categories')->insert([
            'name'=>'Guitarras',
        ]);
        DB::table('categories')->insert([
            'name'=>'Accesorios',
        ]);
        DB::table('categories')->insert([
            'name'=>'Otros',
        ]);
    }
}
