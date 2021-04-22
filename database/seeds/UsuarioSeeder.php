<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'id_pessoa' => 1,
                'username' => "nicolau-np",
                'password' => Hash::make("olaola"),
                'estado' => "on",
                'acesso' => "estudante",
                'email'=>"nic340k@gmail.com",
                'verification_code'=>"78327382732gdjsg",
                'is_verified'=>1,
                'email_verified_at'=>"2021-04-13 12:14:11",
            ],

            [
                'id_pessoa' => 2,
                'username' => "Banco IGE GRUPO 7",
                'password' => Hash::make("baba20"),
                'estado' => "on",
                'acesso' => "admin",
                'email'=>"geral@gmail.com",
                'verification_code'=>"78327382732gdjsg32",
                'is_verified'=>1,
                'email_verified_at'=>"2021-04-13 12:14:11"
            ],


        ]);
    }
}
