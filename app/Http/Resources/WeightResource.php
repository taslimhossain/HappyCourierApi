<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeightResource extends JsonResource
{

    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'weights';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var User $user */
        $items = $this;
        return [
            'id'             => $items->id,
            'from'           => $items->from,
            'to'             => $items->to,
            'inside_amount'  => $items->inside_amount,
            'outside_amount' => $items->outside_amount,
            'status'         => (bool) $items->status,
            'created_at'     => $items->created_at->toISOString(),
            'updated_at'     => $items->updated_at->toISOString()
        ];
    }
}
