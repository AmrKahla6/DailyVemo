<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Amr kahla',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'group'    => 'admin'
        ]);
    }
}
