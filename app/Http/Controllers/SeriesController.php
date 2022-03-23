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
        $serie = Serie::create($request->all());
        $request->session()->flash('message', "Série {$serie->name} criada com sucesso #{$serie->id}");
        return redirect()->route('series-list');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('message', "Série com ID #{$request->id} removida com sucesso!");
        return redirect()->route('series-list');
    }
}
