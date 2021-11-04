<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $p = new Post;
        //$p-> id = '1';
        $p-> user_id = '1';
        $p-> body = 'Example comment';
        $p-> created_at = '22:22:22';
        $p-> created_at = '22:22:22';
        $p->user_id = 1;

        $p->save();

        $post = Post::factory()->count(10)->create(['user_id' => 1]);


    }
}
