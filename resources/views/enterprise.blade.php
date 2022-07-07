@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Détails entreprise') }}</div>

                <div class="card-body">
                    <p class="card-text"><strong>Nom:</strong> {{ $enterprise->name }}</p>
                    <p class="card-text"><strong>Type de travaux:</strong>
                        @foreach ($enterprise->works as $work)
                            {{ $work->name }} -
                        @endforeach
                    </p>
                    <p class="card-text"><strong>Contact:</strong> {{ $enterprise->number }} - {{ $enterprise->numberref }}</p>

                    <a class="btn btn-primary" href="{{ route('modifEnterprise.get', ['id' => $enterprise->id]) }}">Modifier l'entreprise</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">{{ __('Contact Entreprise') }}</div>
                <div class="card-body">
                    <a href="{{ route('devis.get', ['id' => $enterprise->id]) }}" class="card-text"><strong>Demande de devis</strong></a>
                    <a href="#" class="card-text"><strong>Demande urgente</strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
