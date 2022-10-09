<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
//use App\Models\Zone;

class PickuplocationResource extends JsonResource
{

    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'pickuplocation';

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
        //$zone = Zone::findOrFail($item->zone_id);
        return [
            'id'         => $item->id,
            'name'       => $item->name,
            'zone_id'    => $item->zone_id,
            //'zone_name'  => isset($zone->name) ? $zone->name : '',
            'status'     => (bool) $item->status,
            'created_at' => $item->created_at->toISOString(),
            'updated_at' => $item->updated_at->toISOString()
        ];
    }
}