<?php

namespace App\Http\Resources\File;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{


    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'files';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var File $file */
        $file = $this;
        return [
            'id' => $file->id,
            'uuid' => $file->uuid,
            'name' => $file->name,
            'size' => $file->size,
            'mime' => $file->mime,
            'extension' => $file->extension,
            'url' => $file->url(),
            //'download' => $file->download(),
        ];
    }
}
