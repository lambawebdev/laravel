<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticlesForSecondUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Article::factory()->count(10)->create(['owner_id' => 2]);
    }
}
