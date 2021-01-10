<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             // Add super admin and attach super admin role
             $superAdmin = new User(array_filter([
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('123456'),
            ]));

            $superAdmin->save();
    }
}
