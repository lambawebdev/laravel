<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticlesForFirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Article::factory()->count(10)->create(['owner_id' => \App\Models\User::first()]);
    }
}
