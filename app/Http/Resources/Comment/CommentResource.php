<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
    return [
            "commentId"         => $this->commentId,
            "commentPostId"     => $this->commentPostId,
            "commentContent"    => $this->commentContent,
            "comentator"        => $this->whenLoaded('commentator'),
            "created_at"        => date_format($this->created_at, "d/M/Y H:i:s"),
            "updated_at"        => date_format($this->updated_at, "d/M/Y H:i:s"),
        ];
    }
}
