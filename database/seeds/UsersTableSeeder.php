<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@user.com',
            'password' => bcrypt('s3cr3t'),
        ]);
    }
}
