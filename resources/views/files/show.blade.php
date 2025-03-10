@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fichier') }}</div>

                <div class="card-body">
                    <p>Nom du fichier : {{ $file->name }}</p>
                    <p>Téléversé par : {{ $file->employee->first_name }} {{ $file->employee->last_name }}</p>
                    <a href="{{ route('files.show', $file) }}" class="btn btn-primary">Télécharger</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection