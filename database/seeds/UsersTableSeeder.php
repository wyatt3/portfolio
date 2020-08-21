<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'Wyatt Johnson',
            'email' => 'test@test.com',
            'password' => password_hash('123456', PASSWORD_BCRYPT),
        ]);
        $user->save();
    }
}
