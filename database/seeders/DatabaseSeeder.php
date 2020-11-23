<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Admin::truncate();
        Currency::truncate();
        $user = User::create([
            'name' => 'Joe Gitonga',
            'email' => 'master@noriapos.dev',
            'phone_number' => '0728656735',
            'password' => Hash::make('pass_12345')
        ]);

        Admin::create([
            'user_id' => $user->id,
            'super_admin' => true
        ]);

        Currency::insert([
            ['code' => 'KES', 'name' => 'Kenya Shilling', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'USD', 'name' => 'US Dollar', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'GBP', 'name' => 'Great Britain Pound', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'ER', 'name' => 'Euro', 'created_at' => now(), 'updated_at' => now()]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
