<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username'=>'kemal',
            'password'=>Hash::make('456'),
            'no_rekening'=>'130002'
        ]);

        DB::table('users')->insert([
            'username'=>'haiqel',
            'password'=>Hash::make('123'),
            'no_rekening'=>'130001'
        ]);
    }


}
