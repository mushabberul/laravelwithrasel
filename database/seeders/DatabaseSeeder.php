<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Platform;
use App\Models\Series;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make(12345678)
        // ]);

        $series = ['Laravel', 'WordPress', 'JavaScript', 'PHP', 'jQuery'];
        foreach ($series as $item) {
            Series::create([
                'name' => $item
            ]);
        }

        $topic = ['Eloquent', 'Validation', 'Refactoring', 'Testing'];
        foreach ($topic as $item) {
            Topic::create([
                'name' => $item
            ]);
        }
        $platform = ['YouTube', 'Facebook', 'Laracust', 'Laravel.io'];
        foreach ($platform as $item) {
            Platform::create([
                'name' => $item
            ]);
        }

        User::factory(50)->create();
        Course::factory(100)->create();
    }
}
