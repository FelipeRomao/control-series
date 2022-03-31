<?php

namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Mail\NewSerie;
use App\Serie;
use App\Services\SerialRemover;
use App\Services\SeriesCreator;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        // send e-mail
        $users = User::all();
        foreach($users as $user) {
            $email = new NewSerie($request->name, $request->am_seasons, $request->ep_season);
            $email->subject('New serie registered');

            Mail::to($user)->send($email);
            sleep(5);
        }
        // end send e-mail

        $request->session()
            ->flash(
                'message',
                "Série {$serie->name} e suas temporadas e episódios criada com sucesso #{$serie->id}"
            );

        return redirect()->route('series-list');
    }

    public function destroy(Request $request, SerialRemover $serialRemover)
    {
        $nameSerie = $serialRemover->removeSerie($request->id);

        $request->session()->flash('message', "Série {$nameSerie} removida com sucesso!");
        return redirect()->route('series-list');
    }

    public function updateName(int $id, Request $request)
    {
        $newName = $request->name;

        $serie = Serie::find($id);
        $serie->name = $newName;
        $serie->save();
    }
}
