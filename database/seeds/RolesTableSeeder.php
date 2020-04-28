<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            [
                'role' => 'Admin',
                'description' => 'Has all the rights',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'role' => 'CEO',
                'description' => 'Has all the rights',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Director - Programs and Standards',
                'description' => 'Has all the rights',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'IT Executive',
                'description' => 'Has all the rights',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'HR Manager',
                'description' => 'Has all the rights',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Procurement Manager',
                'description' => 'Has all the rights',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Software Developer',
                'description' => 'Has all the rights',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Accounts Executive',
                'description' => 'Has all the rights',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
         ]);
        Schema::enableForeignKeyConstraints();
    }
}
