<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'ジョブズ',
            'email' => 'test1@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'sex' => '0',
            'self_introduction' => 'ジョブズです',
            'avatar_file_name' => 'sample001.jpg',
            ],
            ['name' => 'ヘンリー',
            'email' => 'test2@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'sex' => '0',
            'self_introduction' => 'ヘンリーです',
            'avatar_file_name' => 'sample002.jpg',
            ],
            ['name' => 'エリザベス',
            'email' => 'test3@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'sex' => '1',
            'self_introduction' => 'エリザベスです',
            'avatar_file_name' => 'sample003.jpg',
            ],
            ['name' => 'セイバー',
            'email' => 'test4@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'sex' => '1',
            'self_introduction' => 'セイバーです',
            'avatar_file_name' => 'sample004.jpg',
            ],
        ]);
    }
}
