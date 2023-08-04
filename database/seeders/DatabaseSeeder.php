<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SettingModel;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "ilhamGod",
            "username" => "ilham",
            "password" => "admin1",
        ]);

        SettingModel::create([
            "nama_app" => "@microservice",
            "email" => "@microservice",
            "ip" => "192.168.1.0",
        ]);
        echo "seeding: success ..";
    }
}
