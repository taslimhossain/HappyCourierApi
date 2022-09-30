<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'user';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        /** @var User $user */
        $user = $this;
        return [
            'id'         => $user->id,
            'name'       => $user->name,
            'mobile_no'  => $user->mobile_no,
            'email'      => $user->email,
            'user_role'    => $user->user_role,
            'status'     => (bool) $user->status,
            'created_at' => $user->created_at->toISOString(),
            'updated_at' => $user->updated_at->toISOString()
        ];
    }
}
