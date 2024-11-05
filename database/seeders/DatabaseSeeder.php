<?php

namespace Database\Seeders;

use App\Models\CategoryPost;
use App\Models\CategoryService;
use App\Models\CategoryStore;
use App\Models\Post;
use App\Models\Service;
use App\Models\Template;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //CategoryStore::factory()->count(10)->create();
        //Template::factory()->count(10)->create();

       // CategoryService::factory()->count(3)->create();
       // Service::factory()->count(10)->create();
       CategoryPost::factory()->count(2)->create();
       Post::factory()->count(10)->create();
    }
}
