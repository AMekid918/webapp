<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $c = new Comment;
        $c-> id = '1';
        $c-> body = 'this is a comment';
        $c-> created_at = '22:22:22';
        $c-> created_at = '22:22:22';
        $c-> user_id = 11;
        $c-> post_id = 11;
        $c->save();

        $comment = Comment::factory()->count(10)->create();
    }
}
