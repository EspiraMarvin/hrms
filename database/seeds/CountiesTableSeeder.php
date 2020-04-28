<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('counties')->truncate();
        DB::table('counties')->insert([
            [
                'region_id' => '1',
                'county' => 'Mombasa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '1',
                'county' => 'Kwale',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '1',
                'county' => 'Kilifi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '1',
                'county' => 'Tana River',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '1',
                'county' => 'Lamu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '1',
                'county' => 'Taita Taveta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '2',
                'county' => 'Garissa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '2',
                'county' => 'Wajir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '2',
                'county' => 'Mandera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '3',
                'county' => 'Marsabit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '3',
                'county' => 'Isiolo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '3',
                'county' => 'Meru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '3',
                'county' => 'Tharaka-Nithi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '3',
                'county' => 'Embu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '3',
                'county' => 'Kitui',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '3',
                'county' => 'Machakos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '3',
                'county' => 'Makueni',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '4',
                'county' => 'Nyandarua',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '4',
                'county' => 'Nyeri',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '4',
                'county' => 'Kirinyaga',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '4',
                'county' => 'Murang`a',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '4',
                'county' => 'Kiambu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '4',
                'county' => 'Nairobi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '5',
                'county' => 'Turkana',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '5',
                'county' => 'West Pokot',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '5',
                'county' => 'Trans-Nzoia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '5',
                'county' => 'Uasin Gishu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '5',
                'county' => 'Elgeyo-Marakwet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '5',
                'county' => 'Nandi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '5',
                'county' => 'Baringo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Samburu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Samburu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Laikipia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Samburu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Laikipia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Nakuru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Narok',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Kajiado',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Kericho',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '6',
                'county' => 'Bomet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '7',
                'county' => 'Kakamega',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '7',
                'county' => 'Vihiga',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '7',
                'county' => 'Bungoma',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '7',
                'county' => 'Busia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '8',
                'county' => 'Siaya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '8',
                'county' => 'Kisumu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '8',
                'county' => 'Homa Bay',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '8',
                'county' => 'Migori',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '8',
                'county' => 'Kisii',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'region_id' => '8',
                'county' => 'Nyamira',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
