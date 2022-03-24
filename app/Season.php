<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['number'];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
