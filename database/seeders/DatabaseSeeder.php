<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\AdminUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        User::factory(10)->create();
        Post::factory(10)->create();

        AdminUser::factory(1)->create([
            "name" => "Admin",
            "email" => "laravel@laravel.com",
            "password" => bcrypt("12345"),
        ]);
    }
}
