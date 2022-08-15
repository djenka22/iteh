<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'project';
    public function toArray($request)
    {
        return  [
             'id' => $this->resource->id,
             'name' => $this->resource->name,
             'description' => $this->resource->description,
             'priority' => $this->resource->priority,
             'client' => $this->resource->client,
             'user' => new UserResource($this->resource->user)


            ];
    }
}
