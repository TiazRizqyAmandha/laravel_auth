<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Works extends JsonResource
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
            'company' => $this->company,
            'position' => $this->position,
            'works_place' => $this->works_place,
            'description' => $this->description,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ];
    }
}
