@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fichiers partagés') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Téléverser un fichier :</label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Téléverser</button>
                    </form>

                    <hr>

                    <h5>Liste des fichiers :</h5>
                    <ul>
                        @foreach ($files as $file)
                            <li><a href="{{ route('files.show', $file) }}">{{ $file->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection