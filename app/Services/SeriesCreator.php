<?php

namespace App\Services;

use App\Serie;

class SeriesCreator
{
    public function createSerie(string $name, int $am_seasons, int $ep_season): Serie
    {
        $serie = Serie::create(['name'=> $name]);

        for($i = 1; $i <= $am_seasons; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);

            for($j = 1; $j <= $ep_season; $j++) {
                $season->episodes()->create(['number' => $j]);
            }
        }

        return $serie;
    }
}
