<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123456')
        ]);
    }
}
