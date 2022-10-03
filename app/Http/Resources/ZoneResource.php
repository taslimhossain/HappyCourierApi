<?php

namespace App\Http\Resources;
use App\Models\District;
use Illuminate\Http\Resources\Json\JsonResource;

class ZoneResource extends JsonResource
{

    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'zones';

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
        $district = District::findOrFail($item->district_id);
        return [
            'id'            => $item->id,
            'name'          => $item->name,
            'district_id'   => $item->district_id,
            'district_name' => isset($district->name) ? $district->name : '',
            'status'        => (bool) $item->status,
            'created_at'    => $item->created_at->toISOString(),
            'updated_at'    => $item->updated_at->toISOString()
        ];
    }
}