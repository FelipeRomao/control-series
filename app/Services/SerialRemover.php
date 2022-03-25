<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\{Serie, Season, Episode};

class SerialRemover
{
    public function removeSerie(int $serieId) : string
    {
        $nameSerie = '';

        DB::transaction(function () use($serieId, &$nameSerie) {
            $serie = Serie::find($serieId);
            $nameSerie = $serie->name;

            $this->removeSeasons($serie);
            $serie->delete();
        });

        return $nameSerie;
    }

    /**
     * @param $serie
     * @return void
     * @throws \Exception
     */
    private function removeSeasons(Serie $serie): void
    {
        $serie->seasons->each(function (Season $season) {
            $this->removeEpisodes($season);
            $season->delete();
        });

    }

    /**
     * @param Season $season
     * @return void
     */
    private function removeEpisodes(Season $season): void
    {
        $season->episodes()->each(function (Episode $episode) {
            $episode->delete();
        });
    }
}
