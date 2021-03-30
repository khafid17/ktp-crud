<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => "Admin",
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => "User",
            'email' => 'user@user.com',
            'password' => bcrypt('user12345')
        ]);
        $admin->assignRole('user');

    }
}
