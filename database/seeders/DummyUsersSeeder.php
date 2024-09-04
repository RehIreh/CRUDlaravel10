<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Ani',
                'email'=>'Ani@gmail.com',
                'role'=>'mahasiswa',
                'password'=>bcrypt(123)
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
