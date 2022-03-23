@extends('layout')

@section('header')
    Create serie
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="mb-2">Name</label>
            <input type="text" class="form-control" name="name" id="name" />
        </div>

        <button class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
