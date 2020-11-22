<?php

namespace App\Http\Resources;

use App\PostsCategory as PostsCategoryModel;
use Illuminate\Http\Resources\Json\JsonResource;

class Posts extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
            'posts_category' => new PostsCategory(PostsCategoryModel::where('id', $this->posts_category_id)->first()),
        ];
    }
}
