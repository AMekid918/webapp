<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $u = new User;
        //$u-> id = '1';
        $u-> name = 'admin';
        $u-> email = 'example@gmail.com';
        $u-> email_verified_at = '22:22:22';
        $u-> password = 'password';
        $u-> created_at = '22:22:22';
        $u-> created_at = '22:22:22';
        $u->save();

        $users = User::factory()->count(10)->create();
    }
}
