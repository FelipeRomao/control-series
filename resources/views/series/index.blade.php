@extends('layout')

@section('header')
        Series
@endsection

@section('content')
    @if(!empty($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif

    <a href="{{ route('form-create-serie') }}" class="btn btn-dark mb-3">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-content-center">
            {{ $serie->name }}
            <form method="post" action="/series/{{ $serie->id  }}"
                  onsubmit="return confirm('Tem certeza que deseja remover a série {{ addslashes($serie->name) }}?')"
            >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
            </form>
        </li>
        @endforeach
    </ul>
@endsection
