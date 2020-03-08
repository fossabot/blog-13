<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            PostsTableSeeder::class,
            TagsTableSeeder::class,
            LikesTableSeeder::class,
//            ContactsUsTableSeeder::class,
//            NewsletterSubscriptionTableSeeder::class,
        ]);
    }
}
