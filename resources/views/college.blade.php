@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Détails collège') }}</div>

                <div class="card-body">
                    <p class="card-text"><strong>Nom:</strong> {{ $college->name }}</p>
                    <p class="card-text"><strong>Adresse:</strong>
                            {{ $college->adresse }}
                    </p>
                    <p class="card-text"><strong>Ville:</strong> {{ $college->ville }}</p>

                    <a class="btn btn-primary" href="{{ route('modifCollege.get', ['id' => $college->id]) }}">Modifier le collège</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">{{ __('Contact Collège') }}</div>
                <div class="card-body">
                    <a href="#" class="card-text"><strong>Demande de devis</strong></a>
                    <a href="#" class="card-text"><strong>Demande urgente</strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
