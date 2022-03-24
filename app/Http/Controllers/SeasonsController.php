<?php

namespace App\Http\Controllers;

use App\Season;
use App\Serie;

class SeasonsController extends Controller
{
    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $seasons = Season::query()->where('serie_id', $serieId)->get();

        return view('seasons.index', compact('seasons', 'serie'));
    }
}
