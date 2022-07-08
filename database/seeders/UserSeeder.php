<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'tim',
            'login' => 'tim123',
            'email' => 'tim@mail.com',
            'dob' => '2003-01-01',
            'password' => Hash::make('qwertyui'),
            'group' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'tom',
            'login' => 'tom123',
            'email' => 'tom@mail.com',
            'dob' => '2003-01-01',
            'password' => Hash::make('qwertyui'),
            'group' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'tem',
            'login' => 'tem123',
            'email' => 'tem@mail.com',
            'dob' => '2003-01-01',
            'password' => Hash::make('qwertyui'),
            'group' => '1',
        ]);
        // User::factory()->count(20)->create();
    }
}
