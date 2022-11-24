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
            'email' => 'wyatt@wyattjohnson.net',
            'password' => password_hash('M1fdmv41!', PASSWORD_BCRYPT),
        ]);
        $user->save();
    }
}
