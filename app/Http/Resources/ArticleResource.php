<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'img' => $this->img,
            'body' => $this->body,
            'published_at' => $this->publishedAtForHumans(),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'state' => new StateResource($this->whenLoaded('state')),
        ];
    }
}
