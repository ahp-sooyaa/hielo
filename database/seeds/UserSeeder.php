<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'super-admin', 'label' => 'SuperAdmin']);
        $user = User::create([
            'name' => 'ahp',
            'email' => 'ahp@email.com',
            'email_verified_at' => date('Y-m-d\TH:i:s'),
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($admin);

        // factory(App\User::class, 10)->create();
    }
}
