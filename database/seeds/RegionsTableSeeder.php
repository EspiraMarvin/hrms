<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('regions')->truncate();
        DB::table('regions')->insert([
            [
                'region' => 'Coast',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region' => 'North Eastern',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region' => 'Eastern',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region' => 'Central & Nairobi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region' => 'North Rift',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region' => 'South Rift',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region' => 'Western',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region' => 'Nyanza',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
