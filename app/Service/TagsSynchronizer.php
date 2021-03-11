<?php

namespace App\Service;
use App\Models\Tag;

class TagsSynchronizer
{
    public function sync($tags, $model)
    {
        $articleTags = $model->tags->keyBy('name');

        $tagsToAttach = $tags->diffKeys($articleTags);
        $tagsToDetach = $articleTags->diffKeys($tags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $model->tags()->attach($tag);
        }

        foreach ($tagsToDetach as $tag) {
            $tags->tags()->detach($tag);
        }
    }
}
