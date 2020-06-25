<?php

use App\Role;
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
        Role::create([
            'role' => 'Admin',
            'job_group' => 'System',
            'description' => 'Has all the rights',
        ]);
        Role::create([
            'role' => 'Supervisor',
            'job_group' => 'System',
            'description' => 'Oversees tasks and approve leaves',
        ]);
        Role::create([
            'role' => 'Manager, HR & Administration',
            'job_group' => 'ICTA 4',
            'description' => '',
        ]);
        DB::table('roles')->insert([

            [
                'role' => 'CEO',
                'job_group' => 'ICTA 1',
                'description' => 'Chief Executive Officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Director Programs & Standards',
                'job_group' => 'ICTA 2',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Director Shared Services',
                'job_group' => 'ICTA 2',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Director Research, Innovation & Partnerships',
                'job_group' => 'ICTA 2',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Director ICT Service Management',
                'job_group' => 'ICTA 2',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Director Corporate Services',
                'job_group' => 'ICTA 2',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of Infrastructure',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of Applications',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of Information Security',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of Standards & Processes',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of PMO',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of Planning, Performance & Monitoring & Evaluation',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of Partnership & Alliances',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of Research & Innovation',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of ICT Service Centre (Call Centre)',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of Management Units',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Head of Capacity Development',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Corporate Secretary/Head of Legal Services',
                'job_group' => 'ICTA 3',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Manager, Finance & Accounting',
                'job_group' => 'ICTA 4',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Manager, Procurement',
                'job_group' => 'ICTA 4',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Manager, Communication',
                'job_group' => 'ICTA 4',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Manager, Manager, Internal Audit & Risk',
                'job_group' => 'ICTA 4',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Manager, Supply Chain Management',
                'job_group' => 'ICTA 4',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Data Centre Management Lead',
                'job_group' => 'ICTA 5',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Enterprise Applications Lead',
                'job_group' => 'ICTA 5',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Regional ICT Officer',
                'job_group' => 'ICTA 6',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Special Project Officer',
                'job_group' => 'ICTA 6',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Network Administrator',
                'job_group' => 'ICTA 6',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Database Administrator',
                'job_group' => 'ICTA 6',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Accountant',
                'job_group' => 'ICTA 6',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Internal Auditor',
                'job_group' => 'ICTA 6',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Enterprise Applications Maintenance Specialist',
                'job_group' => 'ICTA 6',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Supply Chain Management Officer',
                'job_group' => 'ICTA 6',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Public Communication Officer',
                'job_group' => 'ICTA 6',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Office Administrator',
                'job_group' => 'ICTA 7',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Human Resource Officer',
                'job_group' => 'ICTA 7',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Assistant Accountant',
                'job_group' => 'ICTA 7',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'ICT Officer',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Assistant ICT Officer',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Database Analyst',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Data Centre Analyst',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Network Analyst',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Project Assistant',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Accounts Assistant',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Supply Chain Assistant',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Partner Relations officer',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Recruitment & Talent Management Officer',
                'job_group' => 'ICTA 8',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Clerical Officer',
                'job_group' => 'ICTA 9',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Office Assistant/Driver',
                'job_group' => 'ICTA 10',
                'description' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
