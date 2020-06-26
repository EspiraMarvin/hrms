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
            ],
            [

                'role' => 'Emergency Leave',
                'description' => 'It\'s unplanned for and inevitable. To take care of an urgent situation.',
            ],
            [

                'role' => 'Sick Leave',
                'description' => 'Time off that employees take to address their health and safety needs.',
            ],
            [

                'role' => 'Maternity Leave',
                'description' => '90 days leave. For the female employees who are going to deliver.',
            ],
            [

                'role' => 'Paternity Leave',
                'description' => '10 days leave. For the male employees to attend to their newborn babies.',
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
