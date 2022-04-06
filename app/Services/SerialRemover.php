<?php

namespace App\Services;
use Storage;
use Illuminate\Support\Facades\DB;
use App\{Events\SerieDeleted, Serie, Season, Episode};

class SerialRemover
{
    public function removeSerie(int $serieId) : string
    {
        $nameSerie = '';

        DB::transaction(function () use($serieId, &$nameSerie) {
            $serie = Serie::find($serieId);
            $serieObj = (object) $serie->toArray();
            $nameSerie = $serie->name;

            $this->removeSeasons($serie);
            $serie->delete();

            $event = new SerieDeleted($serieObj);
            event($event);
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
