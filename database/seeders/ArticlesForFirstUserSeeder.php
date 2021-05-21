<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesForFirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\Article::factory()->count(10)->create(['owner_id' => \App\Models\User::first()])
//        ->each(function ($article) {
//            $article->tags()->save();
//        });

        Article::factory()
            ->has(Tag::factory()->count(1))
            ->count(50)
            ->create(['owner_id' => \App\Models\User::first()]);

        Article::first()->tags()->attach(Tag::skip(1)->first());
        Article::skip(1)->first()->tags()->attach(Tag::first());
    }
}
