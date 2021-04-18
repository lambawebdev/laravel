<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
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
//        \App\Models\Article::factory()->count(10)->create(['owner_id' => \App\Models\User::latest()->first()]);

        Article::factory()
            ->has(Tag::factory()->count(1))
            ->count(10)
            ->create(['owner_id' => \App\Models\User::latest()->first()]);


    }
}
