<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        $user = User::create([
            'name' => 'Marvin Espira',
            'email' => 'espiramarvin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('12345678'),
            ]);
        $user->roles()->attach([2,1]);
        $user->supervisedBy()->attach([2,3]);

        $user = User::create([
                'name' => 'Kimberly Jul',
                'email' => 'kim@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('12345678')
            ]);
        $user->roles()->attach([2,3]);
        $user->supervisedBy()->attach([1,3]);


        $user = User::create([
               'name' => 'Jadon Sancho',
               'email' => 'sancho@gmail.com',
               'email_verified_at' => Carbon::now(),
               'password' => bcrypt('12345678')
           ]);
        $user->roles()->attach([2,1]);
        $user->supervisedBy()->attach([1,2]);



        /*     $items = [
                 ['id' => 1, 'name' => 'Marvin Espira','email' => 'espiramarvin@gmail.com','email_verified_at' => Carbon::now(),'password' => bcrypt('12345678'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                 ['id' => 2, 'name' => 'Kimberly Jul','email' => 'kim@gmail.com','email_verified_at' => Carbon::now(),'password' => bcrypt('12345678'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                 ['id' => 3, 'name' => 'Jadon Sancho','email' => 'espiramarvin@gmail.com','email_verified_at' => Carbon::now(),'password' => bcrypt('12345678'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
             ];

             foreach ($items as $item) {
                 User::create(['id' => $item['id']],$item);
             }*/
        Schema::enableForeignKeyConstraints();
    }
}
