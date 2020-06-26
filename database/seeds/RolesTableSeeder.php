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
       /* Role::create([
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
        ]);*/
        DB::table('roles')->insert([
            [
                'role' => 'Admin',
                'job_group' => 'System',
                'description' => 'Has all the rights',
            ],
            [
                'role' => 'Supervisor',
                'job_group' => 'System',
                'description' => 'Oversees tasks and approve leaves',
            ],
            [
                'role' => 'Manager, HR & Administration',
                'job_group' => 'ICTA 4',
                'description' => '',
            ],
            [
                'role' => 'CEO',
                'job_group' => 'ICTA 1',
                'description' => 'Chief Executive Officer',
            ],
            [
                'role' => 'Director Programs & Standards',
                'job_group' => 'ICTA 2',
                'description' => '',
            ],
            [
                'role' => 'Director Shared Services',
                'job_group' => 'ICTA 2',
                'description' => '',
            ],
            [
                'role' => 'Director Research, Innovation & Partnerships',
                'job_group' => 'ICTA 2',
                'description' => '',
            ],
            [
                'role' => 'Director ICT Service Management',
                'job_group' => 'ICTA 2',
                'description' => '',
            ],
            [
                'role' => 'Director Corporate Services',
                'job_group' => 'ICTA 2',
                'description' => '',
            ],
            [
                'role' => 'Head of Infrastructure',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of Applications',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of Information Security',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of Standards & Processes',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of PMO',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of Planning, Performance & Monitoring & Evaluation',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of Partnership & Alliances',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of Research & Innovation',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of ICT Service Centre (Call Centre)',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of Management Units',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Head of Capacity Development',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Corporate Secretary/Head of Legal Services',
                'job_group' => 'ICTA 3',
                'description' => '',
            ],
            [
                'role' => 'Manager, Finance & Accounting',
                'job_group' => 'ICTA 4',
                'description' => '',
            ],
            [
                'role' => 'Manager, Procurement',
                'job_group' => 'ICTA 4',
                'description' => '',
            ],
            [
                'role' => 'Manager, Communication',
                'job_group' => 'ICTA 4',
                'description' => '',
            ],
            [
                'role' => 'Manager, Manager, Internal Audit & Risk',
                'job_group' => 'ICTA 4',
                'description' => '',
            ],
            [
                'role' => 'Manager, Supply Chain Management',
                'job_group' => 'ICTA 4',
                'description' => '',
            ],
            [
                'role' => 'Data Centre Management Lead',
                'job_group' => 'ICTA 5',
                'description' => '',
            ],
            [
                'role' => 'Enterprise Applications Lead',
                'job_group' => 'ICTA 5',
                'description' => '',
            ],
            [
                'role' => 'Regional ICT Officer',
                'job_group' => 'ICTA 6',
                'description' => '',
            ],
            [
                'role' => 'Special Project Officer',
                'job_group' => 'ICTA 6',
                'description' => '',
            ],
            [
                'role' => 'Network Administrator',
                'job_group' => 'ICTA 6',
                'description' => '',
            ],
            [
                'role' => 'Database Administrator',
                'job_group' => 'ICTA 6',
                'description' => '',
            ],
            [
                'role' => 'Accountant',
                'job_group' => 'ICTA 6',
                'description' => '',
            ],
            [
                'role' => 'Internal Auditor',
                'job_group' => 'ICTA 6',
                'description' => '',
            ],
            [
                'role' => 'Enterprise Applications Maintenance Specialist',
                'job_group' => 'ICTA 6',
                'description' => '',
            ],
            [
                'role' => 'Supply Chain Management Officer',
                'job_group' => 'ICTA 6',
                'description' => '',
            ],
            [
                'role' => 'Public Communication Officer',
                'job_group' => 'ICTA 6',
                'description' => '',
            ],
            [
                'role' => 'Office Administrator',
                'job_group' => 'ICTA 7',
                'description' => '',
            ],
            [
                'role' => 'Human Resource Officer',
                'job_group' => 'ICTA 7',
                'description' => '',
            ],
            [
                'role' => 'Assistant Accountant',
                'job_group' => 'ICTA 7',
                'description' => '',
            ],
            [
                'role' => 'ICT Officer',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Assistant ICT Officer',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Database Analyst',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Data Centre Analyst',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Network Analyst',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Project Assistant',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Accounts Assistant',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Supply Chain Assistant',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Partner Relations officer',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Recruitment & Talent Management Officer',
                'job_group' => 'ICTA 8',
                'description' => '',
            ],
            [
                'role' => 'Clerical Officer',
                'job_group' => 'ICTA 9',
                'description' => '',
            ],
            [
                'role' => 'Office Assistant/Driver',
                'job_group' => 'ICTA 10',
                'description' => '',
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
