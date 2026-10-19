<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::select('id')->get();
        foreach($posts as $post) {
            if(rand(0, 9)){
            Image::factory()->create(['post_id' => $post->id]);
            }
        }
    }
}
