<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Zone;

class AreaResource extends JsonResource
{

    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'areas';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var User $user */
        $item = $this;
        $zone = Zone::findOrFail($item->zone_id);
        return [
            'id'         => $item->id,
            'name'       => $item->name,
            'zone_id'    => $item->zone_id,
            'zone_name'  => isset($zone->name) ? $zone->name : '',
            'pickup_accept'   => $item->pickup_accept,
            'delivery_accept' => $item->delivery_accept,
            'status'     => (bool) $item->status,
            'created_at' => $item->created_at->toISOString(),
            'updated_at' => $item->updated_at->toISOString()
        ];
    }
}