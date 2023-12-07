<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class employees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //
        DB::table('employees')->insert([
            'name'=>'Riswan Ardinata',
            'gender'=>'male',
            'phonenum'=>'081423453843',
        ]);
    }
}
