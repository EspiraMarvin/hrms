<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('user_role')->truncate();

        DB::table('user_role')->insert([
            [
                'role_id' => 2,
                'user_id' => 1,
            ],
            [
                'role_id' => 3,
                'user_id' => 1,
            ],

            [
                'role_id' => 2,
                'user_id' => 2,
            ],
            [
                'role_id' => 4,
                'user_id' => 2,
            ],

            [
                'role_id' => 2,
                'user_id' => 3,
            ],
            [
                'role_id' => 5,
                'user_id' => 3,
            ],

        ]);
        Schema::enableForeignKeyConstraints();

    }
}
