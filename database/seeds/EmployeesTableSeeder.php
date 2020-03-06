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
                'status' => '1',
                'name' => 'Admin Admin',
                'email' => 'admin@gmail.com',
                'gender' => '1',
                'date_of_birth' => '2020-02-10 15:23:44',
                'date_of_joining' => Carbon::now(),
                'phone_number' => '0701437909',
                'qualification' => '',
                'emergency_number' => '',
                'kra_pin' => '',
                'father_name' => '',
                'current_address' => '',
                'permanent_address' => '',
                'role' => '',
                'department' => '',
                'supervisor' => '',
                'duty_station' => '',
                'posted_date' => '2020-02-10 15:23:44',
                'employment_type' => '1',
                'salary' => '',
                'account_number' => '',
                'bank_name' => '',
                'pf_account_number' => '',
                'pf_status' => '1',
                'date_of_resignation' => '2020-02-10 15:23:44',
                'notice_period' => '',
                'last_working_day' => '2020-02-10 15:23:44',
                'full_final' => '1',
                'user_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'photo' => '',
                'code' => 'HR0001',
                'status' => '1',
                'name' => 'HR Manager',
                'email' => 'hr@gmail.com',
                'gender' => '1',
                'date_of_birth' => '2020-02-10 15:23:44',
                'date_of_joining' => Carbon::now(),
                'phone_number' => '7383483937',
                'qualification' => '',
                'emergency_number' => '',
                'kra_pin' => '',
                'father_name' => '',
                'current_address' => '',
                'permanent_address' => '',
                'duty_station' => '',
                'posted_date' => '2020-05-10 10:23:04',
                'employment_type' => '1',
                'role' => '',
                'department' => '',
                'supervisor' => '',
                'salary' => '',
                'account_number' => '',
                'bank_name' => '',
                'pf_account_number' => '',
                'pf_status' => '1',
                'date_of_resignation' => Carbon::now(),
                'notice_period' => '',
                'last_working_day' => Carbon::now(),
                'full_final' => '0',
                'user_id' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }

}
