<?php

namespace Database\Seeders;

use Carbon\Factory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User::factory()->count(10)->create();

    }
}
