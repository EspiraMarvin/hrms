<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('departments')->truncate();
        DB::table('departments')->insert([
            [
                'department' => 'DLP',
                'directorate_id' => '1',
                'description' => 'Digital Literacy Program',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'department' => 'Ajira',
                'directorate_id' => '1',
                'description' => 'Youth Empowerment',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
