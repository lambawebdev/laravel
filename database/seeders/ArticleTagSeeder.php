<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('article_tag')->insert([
                [
                    'article_id' => mt_rand(0, 10),
                    'tag_id' => mt_rand(0, 10),
                ],
                [
                    'article_id' => mt_rand(0, 10),
                    'tag_id' => mt_rand(0, 10),
                ],
            ]);
    }
}
