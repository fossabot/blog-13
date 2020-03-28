<?php

use Illuminate\Database\Seeder;

/**
 * Class LikesTableSeeder
 */
class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment(['local', 'staging', 'testing'])) {
            factory(\App\Models\Like::class, 100)->create();
        }
    }
}
