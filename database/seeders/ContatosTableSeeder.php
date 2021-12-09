<?php

namespace Database\Seeders;

use Carbon\Factory;
use Database\Factories\ContatoFactory;
use Illuminate\Database\Seeder;

class ContatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // para utilizar a Model com persistência em banco, como seria num seeder por exemplo
      \App\Models\Contato::factory()->count(10)->create();
    }
}
