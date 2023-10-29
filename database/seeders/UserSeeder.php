<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        $user = [
            [
               'email'=>'admin@inv.com',
               'password' => Hash::make('123456'),
               'user_type'=>'super',
               'status'=>'active',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
}
}
