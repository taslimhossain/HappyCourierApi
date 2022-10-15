<?php

namespace App\Http\Resources;
use App\Models\District;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchantResource extends JsonResource
{

    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'merchant';

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
            'mobile_no'  => $item->mobile_no,
            'email'      => $item->email,
            'user_role'    => $item->user_role,
            'status'     => (bool) $item->status,
            'created_at' => $item->created_at->toISOString(),
            'updated_at' => $item->updated_at->toISOString()
        ];
    }
}