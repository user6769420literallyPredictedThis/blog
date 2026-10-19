<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::select('id')->get();
        $posts = Post::factory(1000)->make();
        $posts = $posts->sortBy('created_at');
        foreach ($posts as $post) {
            $post->user_id = $users->random()->id;
            $post->save();
        }
    }
}
