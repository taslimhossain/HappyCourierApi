<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Zone;
use App\Models\Hub;

class HubandZoneResource extends JsonResource
{

    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'hubandzones';

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
        $hub = Hub::findOrFail($item->hub_id);
        return [
            'id'         => $item->id,
            'zone_id'    => $item->zone_id,
            'zone_name'  => isset($zone->name) ? $zone->name : '',
            'hub_id'     => $item->hub_id,
            'hub_name'  => isset($hub->name) ? $hub->name : '',
            'created_at' => $item->created_at->toISOString(),
            'updated_at' => $item->updated_at->toISOString()
        ];
    }
}
