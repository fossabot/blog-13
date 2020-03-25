<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = self::defaultUser();

        foreach ($users as $name => $email) {
            $user = \App\Models\User::firstOrCreate([
                'name' => strtolower($name),
                'email' => $email,
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('secret'),
                'remember_token' => Str::random(10),
                'api_token' => Str::random(32)
            ]);
            $user->assignRole('admin');
        }

        if (App::environment(['local', 'staging', 'testing'])) {
            // return local database settings array
            factory(\App\Models\User::class, 100)->create();
        }
    }

    /**
     * Seed default users
     *
     * @return array
     */
    protected static function defaultUser()
    {
        return [
            "Nur Wachid" => 'wachid@outlook.com',
            "Admin" => 'admin@example.com',
            "User" => "user@example.com",
            'Costumer Service' => 'costumer-service@example.com',
            'manager' => 'manager@example.com',
            'Master' => 'master@example.com',
            'Administrator' => 'administrator@example.com',
            'Agent' => 'agent@example.com',
            'no replay' => 'noreplay@example.com',
            'Dev' => 'dev@example.com',
            'Developer' => 'developer@example.com',
            'Guest' => 'guest@example.com',
            'User Manager' => 'user.manager@example.com',
            'Media' => 'media@example.com',
            'Role' => 'role@example.com',
            'Permission' => 'permission@example.com',
            'Email' => 'email@example.com'
        ];
    }
}
