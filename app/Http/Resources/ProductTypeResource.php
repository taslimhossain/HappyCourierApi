<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductTypeResource extends JsonResource
{

    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'producttype';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var User $user */
        $district = $this;
        return [
            'id'         => $district->id,
            'name'       => $district->name,
            'name'       => $district->amount,
            'status'     => (bool) $district->status,
            'created_at' => $district->created_at->toISOString(),
            'updated_at' => $district->updated_at->toISOString()
        ];
    }
}
