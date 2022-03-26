<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['number'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function getEpisodesWatched() :Collection
    {
        return $this->episodes->filter(function (Episode $episode) {
            return $episode->assisted;
        });
    }
}
