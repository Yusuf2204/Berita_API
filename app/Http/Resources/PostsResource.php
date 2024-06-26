<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
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
        $date = $this->created_at;
        $new_date = date('d-m-Y', $date->timestamp);

        return $data = array(
            'postId' => $this->postId,
            'postTitle' => $this->postTitle,
            'postNews' => $this->postNews,
            'created_at' => $new_date,
        );
    }
}
