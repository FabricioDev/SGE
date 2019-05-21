<?php

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'email' => 'admin@user.com',
            'enrolment' => 100000,
        ])->each(function (User $user){
            User::assingRole($user, User::ROLE_TEACHER);
            $user->save();
        });
        factory(User::class)->create([
            'name' => 'Fabricio M. Damasceno',
            'email' => 'fabricio.devwebrj@gmail.com',
            'password' => bcrypt('s3cr3t'),
            'enrolment' => 100001,
        ])->each(function (User $user){
            User::assingRole($user, User::ROLE_ADMIN);
            $user->save();
        });
        factory(User::class)->create([
            'name' => 'Uatson',
            'email' => 'jaguarinternet@gmail.com',
            'password' => bcrypt('J@gu@r'),
            'enrolment' => 100002,
        ])->each(function (User $user){
            User::assingRole($user, User::ROLE_ADMIN);
            $user->save();
        });

        // Criando Professor
        factory(User::class,10)->create()->each(function(User $user){
            if(!$user->userable) {
                User::assingRole($user, User::ROLE_TEACHER);
                User::assignEnrolment(new User(), User::ROLE_TEACHER);
                $user->save();
            }
        });

        // Criando Aluno
        factory(User::class,10)->create()->each(function(User $user){
            if(!$user->userable) {
                User::assingRole($user, User::ROLE_STUDENT);
                User::assignEnrolment(new User(), User::ROLE_STUDENT);
                $user->save();
            }
        });

    }
}
