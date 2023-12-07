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
    public function up()
    {   
        //
        Schema::create('employees', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->enum('gender',['male','female']);
            $table->bigInteger('phonenum');
            $table->timeStamps();
        });
    }
}
