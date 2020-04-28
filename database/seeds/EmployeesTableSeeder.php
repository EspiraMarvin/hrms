<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('employees')->truncate();
        DB::table('employees')->insert([
            [
                'photo' => '',
                'code' => 'ADMIN0001',
                'pf_number'=> '458',
                'name' => 'Marvin Espira',
                'status' => 'Present',
                'gender' => 'Male',
                'date_of_birth' => null,
                'date_of_joining' => null,
                'phone_number' => '0701437909',
                'qualification' => '',
                'emergency_number' => '0747437909',
                'kra_pin' => '',
                'father_name' => '',
                'current_address' => '',
                'permanent_address' => '',
//                'role_id' => '1',
                'department' => '',
                'supervisor_id' => null,
                'duty_station' => '',
                'posted_date' => null,
                'employment_type' => 'Permanent',
                'job_group' => 'ICTA 3',
                'salary' => '',
                'account_number' => '',
                'bank_name' => '',
                'date_of_resignation' => null,
                'notice_period' => null,
                'last_working_day' => null,
                'full_final' => null,
                'user_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => '',
                'code' => 'HR0001',
                'pf_number'=> '459',
                'name' => 'Maureen The Goat',
                'status' => 'Present',
                'gender' => 'Female',
                'date_of_birth' => null,
                'date_of_joining' => null,
                'phone_number' => '0738348393',
                'qualification' => '',
                'emergency_number' => '0799180910',
                'kra_pin' => '',
                'father_name' => '',
                'current_address' => '',
                'permanent_address' => '',
                'duty_station' => '',
                'posted_date' => null,
                'employment_type' => 'Permanent',
//                'role_id' => '5',
                'department' => '',
                'supervisor_id' => null,
                'job_group' => '',
                'salary' => '',
                'account_number' => '',
                'bank_name' => '',
                'date_of_resignation' => null,
                'notice_period' => null,
                'last_working_day' => null,
                'full_final' => null,
                'user_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => '',
                'code' => 'CEO001',
                'pf_number'=> '460',
                'name' => 'Kimbery Jul',
                'status' => 'Present',
                'gender' => 'Female',
                'date_of_birth' => null,
                'date_of_joining' => null,
                'phone_number' => '0738348393',
                'qualification' => '',
                'emergency_number' => '0738748370',
                'kra_pin' => '',
                'father_name' => '',
                'current_address' => '',
                'permanent_address' => '',
                'duty_station' => '',
                'posted_date' => null,
                'employment_type' => 'Permanent',
//                'role_id' => '2',
                'department' => 'None',
                'supervisor_id' => null,
                'job_group' => '',
                'salary' => '',
                'account_number' => '',
                'bank_name' => '',
                'date_of_resignation' => null,
                'notice_period' => null,
                'last_working_day' => null,
                'full_final' => null,
                'user_id' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }

}
