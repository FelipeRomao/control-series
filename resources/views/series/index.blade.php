@extends('layout')

@section('header')
        Series
@endsection

@section('content')
    @include('message',['message'=> $message])

    @auth
    <a href="{{ route('form-create-serie') }}" class="btn btn-dark mb-3">
        <i class="fa fa-plus-circle" style="margin-right: 6px" aria-hidden="true"></i> Add
    </a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-content-center">
            <div>
                <img src="{{ $serie->cover_url }}" class="img-thumbnail" height="100px" width="100px" />
                <span id="name-serie-{{ $serie->id }}" style="margin-left: 0.5rem">{{ $serie->name }}</span>
            </div>

            <div class="input-group w-50" hidden id="input-name-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->name }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="updateSerie({{ $serie->id }})">
                        <i class="fa fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <div class="d-flex align-items-center" style="gap:0.5rem">
                @auth
                <button class="btn btn-primary btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                    <i class="fa fa-edit"></i>
                </button>
                @endauth

                <a href="/series/{{ $serie->id }}/seasons" class="btn btn-primary btn-sm">
                    <i class="fa fa-external-link" ></i>
                </a>

                @auth
                <form method="post" action="/series/{{ $serie->id  }}"
                      onsubmit="return confirm('Tem certeza que deseja remover a série {{ addslashes($serie->name) }}?')"
                >
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </form>
                @endauth
            </div>
        </li>
        @endforeach
    </ul>

    <script>
        function toggleInput(serieId) {
            const nameSerie = document.getElementById(`name-serie-${serieId}`);
            const inputSerie = document.getElementById(`input-name-serie-${serieId}`);

            if(nameSerie.hasAttribute('hidden')) {
                nameSerie.removeAttribute('hidden');
                inputSerie.hidden = true;
            } else {
                nameSerie.hidden = true;
                inputSerie.removeAttribute('hidden');
            }
        }

        function updateSerie(serieId) {
            let formData = new FormData();
            const name = document.querySelector(`#input-name-serie-${serieId} > input`).value;

            const token = document.querySelector('input[name="_token"]').value;
            formData.append('name', name);
            formData.append('_token', token);

            const url = `/series/${serieId}/updateName`;
            fetch(url, {
                body: formData,
                method: 'POST',
            }).then(() => {
                toggleInput(serieId);
                document.getElementById(`name-serie-${serieId}`).textContent = name;
            });
        }
    </script>
@endsection
