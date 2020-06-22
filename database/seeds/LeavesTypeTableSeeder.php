<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LeavesTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('leaves')->truncate();
        DB::table('leaves')->insert([
            [

                'leave_type' => 'Annual Leave',
                'description' => '30 days leave. Optional annual leave for each employee',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'role' => 'Emergency Leave',
                'description' => 'It\'s unplanned for and inevitable. To take care of an urgent situation.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'role' => 'Sick Leave',
                'description' => 'Time off that employees take to address their health and safety needs.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'role' => 'Maternity Leave',
                'description' => '90 days leave. For the female employees who are going to deliver.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'role' => 'Paternity Leave',
                'description' => '10 days leave. For the male employees to attend to their newborn babies.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
