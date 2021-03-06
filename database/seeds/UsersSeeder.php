<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                "id" => 1,
                "name" => "TPermal",
                //"firstname" => "Krishna",
                "email" => "tpermal@gmail.com",
                "password" => bcrypt('admin'),
                "id_role" => "1"

            ],
            [
                "id" => 2,
                "name" => "KrishnaPermal",
                //"firstname" => "Krishna",
                "email" => "krishnapermal@gmail.com",
                "password" => bcrypt('admin'),
                "id_role" => "2"

            ],
            [
                "id" => 3,
                "name" => "KrishNaiken",
                //"firstname" => "Krishna",
                "email" => "krishnaiken@gmail.com",
                "password" => bcrypt('admin'),
                "id_role" => "3"

            ]
        ];

        DB::table('users')->insert(
            $array
        );
        factory(User::class, 3)->create();
    }
}
