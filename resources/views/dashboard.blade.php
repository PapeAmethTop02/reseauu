@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Bienvenue, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} !</h4>

                    <h5>Vos fichiers :</h5>
                    <ul>
                        @foreach ($files as $file)
                            <li><a href="{{ route('files.show', $file) }}">{{ $file->name }}</a></li>
                        @endforeach
                    </ul>

                    <a href="{{ route('files.index') }}" class="btn btn-primary">Voir tous les fichiers</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection