<?php

use Illuminate\Database\Seeder;
use App\BlogPost;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 25; $i++) {
            $post = new BlogPost([
                'title' => 'Title ' . $i,
                'content' => 'Update Post ' . $i,
            ]);
            $post->save();
        }
    }
}
