<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceTypeResource extends JsonResource
{

    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'servicetypes';

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

        return [
            'id'         => $item->id,
            'name'       => $item->name,
            'amount'       => $item->amount,
            'status'     => (bool) $item->status,
            'created_at' => $item->created_at->toISOString(),
            'updated_at' => $item->updated_at->toISOString()
        ];
    }
}