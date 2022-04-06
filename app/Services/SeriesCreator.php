<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class SeriesCreator
{
    public function createSerie(string $name, int $am_seasons, int $ep_season, ?string $cover): Serie
    {

        DB::beginTransaction();
        $serie = Serie::create([
            'name'=> $name,
            'cover'=> $cover
        ]);

        $this->createSeasons($am_seasons, $serie, $ep_season);
        DB::commit();

        return $serie;
    }

    /**
     * @param int $am_seasons
     * @param $serie
     * @param int $ep_season
     * @return void
     */
    public function createSeasons(int $am_seasons, $serie, int $ep_season): void
    {
        for ($i = 1; $i <= $am_seasons; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);

            $this->createEpisodes($ep_season, $season);
        }
    }

    /**
     * @param int $ep_season
     * @param $season
     * @return void
     */
    public function createEpisodes(int $ep_season, $season): void
    {
        for ($j = 1; $j <= $ep_season; $j++) {
            $season->episodes()->create(['number' => $j]);
        }
    }
}
