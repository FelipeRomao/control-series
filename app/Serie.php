<?php

namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = ['name', 'cover'];

    public function getCoverUrlAttribute() {
         if($this->cover){
             return Storage::url($this->cover);
         }

        return Storage::url('serie/no-image.png');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}
