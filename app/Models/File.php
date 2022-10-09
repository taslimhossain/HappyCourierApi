<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class File extends Model
{
    
    protected $primaryKey = 'uuid';

    use HasFactory;

    public function url(): ?string
    {
        if ($this->disk === 'public') {
            return Storage::disk($this->disk)->url($this->path.DIRECTORY_SEPARATOR.$this->server_name);
        }
        return null;
    }

}
