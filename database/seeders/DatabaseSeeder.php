<?php
/**
* BCS3453 [PROJECT]-SEMESTER 2324/1
* Student ID: CB21133
* Student Name: CHONG XUE LIANG
*/
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'phone_num' => '0123456789',
            'email' => 'admin@argon.com',
            'role' => 'admin',
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'username' => 'vendor',
            'phone_num' => '0123456782',
            'email' => 'vendor@argon.com',
            'role' => 'vendor',
            'password' => bcrypt('1234')
        ]);
        DB::table('vendors')->insert([
            'IC_number' => '010919080222',
            'user_ID' => '2',
        ]);

        DB::table('booths')->insert([
            'number' => 1,
            'description' => 'First Row First',
            'status' => 'Available',
        ]);
        DB::table('booths')->insert([
            'number' => 2,
            'description' => 'First Row Second',
            'status' => 'Available',
        ]);
        DB::table('booths')->insert([
            'number' => 3,
            'description' => 'First Row Third',
            'status' => 'Available',
        ]);
        DB::table('booths')->insert([
            'number' => 4,
            'description' => 'First Row Fourth',
            'status' => 'Available',
        ]);
        DB::table('booths')->insert([
            'number' => 5,
            'description' => 'First Row Fifth',
            'status' => 'Available',
        ]);

        DB::table('booths')->insert([
            'number' => 6,
            'description' => 'Second Row First',
            'status' => 'Available',
        ]);

        DB::table('booths')->insert([
            'number' => 7,
            'description' => 'Second Row Second',
            'status' => 'Available',
        ]);

        DB::table('booths')->insert([
            'number' => 8,
            'description' => 'Second Row Third',
            'status' => 'Available',
        ]);

        DB::table('booths')->insert([
            'number' => 9,
            'description' => 'Second Row Fourth',
            'status' => 'Available',
        ]);

        DB::table('booths')->insert([
            'number' => 10,
            'description' => 'Second Row Fifth',
            'status' => 'Available',
        ]);

    }
}
