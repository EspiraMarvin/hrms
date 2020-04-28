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
                'description' => 'A 30 days leave for each employee',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'role' => 'Emergency Leave',
                'description' => 'This is when unexpected event occurs that you can not avail yourself on your duties.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'role' => 'Sick Leave',
                'description' => 'When an employee is in poor state of health that he can not do their duties effectively.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'role' => 'Maternity Leave',
                'description' => 'A 90 days leave. It`s for the female gender who are going to give birth.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'role' => 'Paternity Leave',
                'description' => 'A 10 days leave. It`s for the male gender when their partner is going to give birth.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
