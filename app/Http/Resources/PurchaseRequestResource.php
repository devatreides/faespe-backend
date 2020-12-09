<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class PurchaseRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'protocol' => $this->protocol,
            'term_of_reference' => Request::root().'/storage/'.$this->term_of_reference,
            'cities' => CityResource::collection($this->city),
            'deadline' => Carbon::create($this->deadline)->format('d/m/Y'),
            'categories' => CategoryResource::collection($this->category),
            'request_winner' => $this->request_winner,
            'request_winner_file' => Request::root().'/storage/'.$this->request_winner_file,
            'publication_date' => Carbon::create($this->publication_date)->format('d/m/Y'),
            'situation' => $this->situation,
        ];
    }
}
