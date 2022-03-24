<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
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

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create(['name'=> $request->name]);
        $seasons = $request->am_seasons;
        $episodes = $request->ep_season;

        for($i = 1; $i <= $seasons; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);

            for($j = 1; $j <= $episodes; $j++) {
                $season->episodes()->create(['number' => $j]);
            }
        }

        $request->session()->flash('message', "Série {$serie->name} e suas temporadas e episódios criada com sucesso #{$serie->id}");
        return redirect()->route('series-list');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('message', "Série com ID #{$request->id} removida com sucesso!");
        return redirect()->route('series-list');
    }
}
