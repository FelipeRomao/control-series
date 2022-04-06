@extends('layout')

@section('header')
    Seasons from {{ $serie->name }}
@endsection

@section('content')
    @if($serie->cover)
    <div class="d-flex align-items-center justify-content-center mb-4">
        <a href="{{ $serie->cover_url }}" target="_blank">
            <img src="{{ $serie->cover_url }}" class="img-thumbnail" height="400px" width="400px" />
        </a>
    </div>
    @endif

    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/seasons/{{ $season->id  }}/episodes">
                    Season {{ $season->number  }}
                </a>

                <span class="badge bg-secondary">
                    {{ $season->getEpisodesWatched()->count() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection
