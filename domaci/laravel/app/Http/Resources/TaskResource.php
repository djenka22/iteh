<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\CategoryResource;


class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'task';
    public function toArray($request)
    {
        return  [
             'id' => $this->resource->id,
             'name' => $this->resource->name,
             'description' => $this->resource->description,
             'priority' => $this->resource->priority,
             'project' => new ProjectResource($this->resource->project),
             'category' => new CategoryResource($this->resource->category)



            ];
    }
}
