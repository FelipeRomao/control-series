<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Http\Requests\SeriesFormRequest;
use App\Season;
use App\Serie;
use App\Services\SeriesCreator;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('name')->get();
        $message = $request->session()->get('message');

        $html ="<ul>";
        foreach($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        $html .="<ul>";

        return view('series.index', compact('series', 'message'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SeriesCreator $seriesCreator)
    {
        $serie = $seriesCreator->createSerie(
            $request->name,
            $request->am_seasons,
            $request->ep_season
        );

        $request->session()
            ->flash(
                'message',
                "Série {$serie->name} e suas temporadas e episódios criada com sucesso #{$serie->id}"
            );

        return redirect()->route('series-list');
    }

    public function destroy(Request $request)
    {
        $serie = Serie::find($request->id);
        $nameSerie = $serie->name;

        $serie->seasons->each(function (Season $season) {
            $season->episodes()->each(function (Episode $episode) {
                $episode->delete();
            });

            $season->delete();
        });

        $serie->delete();
        $request->session()->flash('message', "Série {$nameSerie} removida com sucesso!");
        return redirect()->route('series-list');
    }
}
