<?php

use App\Users;
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
                "nom" => "TPermal",
                "prenom" => "Krishna",
                "email" => "tpermal@gmail.com",
                "password" => "admin",
                "id_role" => "1"

            ]
        ];

        DB::table('users')->insert(
            $array
        );
        factory(Users::class, 3)->create();
    }
}