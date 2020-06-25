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
                'department_id' => 1,
                'photo' => 'noimage.jpg',
                'code' => '479922',
                'pf_number'=> 'ADMIN0001',
                'name' => 'Marvin Espira',
                'status' => 'Present',
                'gender' => 'Male',
                'date_of_birth' => null,
                'date_of_joining' => null,
                'phone_number' => '0701437909',
                'qualification' => '',
                'emergency_number' => '0747437909',
                'kra_pin' => '',
                'kin_name' => '',
                'current_address' => '',
                'permanent_address' => '',
                'duty_station' => '',
                'posted_date' => null,
                'employment_type' => 'Permanent',
                'salary' => '96000',
                'account_number' => '',
                'bank_name' => '',
                'date_of_resignation' => null,
                'notice_period' => null,
                'last_working_day' => null,
                'user_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'department_id' => 1,
                'photo' => 'noimage.jpg',
                'code' => '7439822',
                'pf_number'=> 'CEO001',
                'name' => 'Kimbery Jul',
                'status' => 'Present',
                'gender' => 'Female',
                'date_of_birth' => null,
                'date_of_joining' => null,
                'phone_number' => '0738348393',
                'qualification' => '',
                'emergency_number' => '0799180910',
                'kra_pin' => '',
                'kin_name' => '',
                'current_address' => '',
                'permanent_address' => '',
                'duty_station' => '',
                'posted_date' => null,
                'employment_type' => 'Permanent',
                'salary' => '120000',
                'account_number' => '',
                'bank_name' => '',
                'date_of_resignation' => null,
                'notice_period' => null,
                'last_working_day' => null,
                'user_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'department_id' => 2,
                'photo' => 'noimage.jpg',
                'code' => '9230923',
                'pf_number'=> 'HR0001',
                'name' => 'Jadon Sancho',
                'status' => 'Present',
                'gender' => 'Male',
                'date_of_birth' => null,
                'date_of_joining' => null,
                'phone_number' => '0738348393',
                'qualification' => '',
                'emergency_number' => '0738748370',
                'kra_pin' => '',
                'kin_name' => '',
                'current_address' => '',
                'permanent_address' => '',
                'duty_station' => '',
                'posted_date' => null,
                'employment_type' => 'Contract (05/11/2020 - 08/12/2024)',
                'salary' => '80000',
                'account_number' => '',
                'bank_name' => '',
                'date_of_resignation' => null,
                'notice_period' => null,
                'last_working_day' => null,
                'user_id' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }

}
