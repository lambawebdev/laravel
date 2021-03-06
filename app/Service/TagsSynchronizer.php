<?php

namespace App\Service;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection ;

class TagsSynchronizer
{
    public function sync(Collection $tags, Model $model)
    {
        /** @var  $articleTags Collection */
        $articleTags = $model->tags->keyBy('name');

        $tagsToAttach = $tags->diffKeys($articleTags);
        $tagsToDetach = $articleTags->diffKeys($tags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $model->tags()->attach($tag);
        }

        foreach ($tagsToDetach as $tag) {
            $model->tags()->detach($tag);
        }
    }
}
