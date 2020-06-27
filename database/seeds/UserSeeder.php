<?php

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
        DB::table('users')->insert([
            'name'              => 'Luis',
            'surname'           => 'Figueroa',
            'rut'               => '17.460.057-0',
            'email'             => 'luisfigueroa@webstyle.cl',
            'email_verified_at' => '2020-05-31 00:38:19',
            'password'          => Hash::make('dgwKv6FMNcMNq8a'),
        ]);

        DB::table('users')->insert([
            'name'              => 'Andres',
            'surname'           => 'Riquelme',
            'rut'               => '11.111.111-1',
            'email'             => 'cliente@prueba.cl',
            'email_verified_at' => '2020-05-31 00:38:19',
            'password'          => Hash::make('YqkP34BSGZ7bL6x'),
        ]);
    }
}
