<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\District;
use App\Models\Zone;
use App\Models\Area;

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
        $distric = District::findOrFail($item->district_id);
        $zone = Zone::findOrFail($item->zone_id);
        $area = Area::findOrFail($item->area_id);
        return [
            'id'          => $item->id,
            'name'        => $item->name,
            'address'     => $item->address,
            'phone'       => $item->phone,
            'email'       => $item->email,
            'district_id' => $item->district_id,
            'district_name'   => isset($distric->name) ? $distric->name : '',
            'zone_id'     => $item->zone_id,
            'zone_name'   => isset($zone->name) ? $zone->name : '',
            'area_id'     => $item->area_id,
            'area_name'   => isset($area->name) ? $area->name : '',
            'status'      => (bool) $item->status,
            'created_at'  => $item->created_at->toISOString(),
            'updated_at'  => $item->updated_at->toISOString()
        ];
    }
}