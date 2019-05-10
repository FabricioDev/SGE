<?php

use App\Models\User;
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
        //Usuários padrões do sistema
        //Pode logar com o e-mail ou matricula
        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@user.com',
            'password' => bcrypt('s3cr3t'),
            'enrolment' => 100000,
        ]);
        factory(User::class)->create([
            'name' => 'Fabricio M. Damasceno',
            'email' => 'fabricio.devwebrj@gmail.com',
            'password' => bcrypt('s3cr3t'),
            'enrolment' => 100001,
        ]);
        factory(User::class)->create([
            'name' => 'Uatson',
            'email' => 'jaguarinternet@gmail.com',
            'password' => bcrypt('J@gu@r'),
            'enrolment' => 100002,
        ]);
    }
}
