<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\GenreResource;
use App\Http\Resources\AuthorResource;


class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'book';

    public function toArray($request)
    {
        //return parent::toArray($request);

        return[
            'id'=>$this->resource->id,
            'title'=>$this->resource->title,
            'number_of_pages'=>$this->resource->number_of_pages,
            'year_of_release'=>$this->resource->year_of_release,
            'author'=> new AuthorResource($this->resource->author),
            'genre'=> new GenreResource($this->resource->genre),
            'user'=> new UserResource($this->resource->user)
        ];  


    }
}
