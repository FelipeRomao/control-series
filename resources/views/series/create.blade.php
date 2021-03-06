@extends('layout')

@section('header')
    Create serie
@endsection

@section('content')
    @include('errors', ['errors' => $errors])

    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" />
            </div>

            <div class="col col-2">
                <label for="am_seasons">Nº seasons</label>
                <input type="number" class="form-control" name="am_seasons" id="am_seasons" />
            </div>

            <div class="col col-2">
                <label for="ep_season">Ep. per season</label>
                <input type="number" class="form-control" name="ep_season" id="ep_season" />
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-12">
                <label for="cover">Capa</label>
                <input class="form-control" type="file" id="cover" name="cover" />
            </div>
        </div>

        <button class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
