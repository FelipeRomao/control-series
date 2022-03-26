@extends('layout')

@section('header')
    Episodes
@endsection

@section('content')
    @include('message',['message'=> $message])

    <form action="/seasons/{{ $seasonId }}/episodes/watch" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episode {{ $episode->number }}
                    <input
                        type="checkbox"
                        name="episodes[]"
                        value="{{ $episode->id  }}"
                        {{$episode->assisted ? 'checked' : ''}}>
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-3 mb-3">Save</button>
    </form>

@endsection
