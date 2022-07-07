@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modification collège') }}</div>

                <div class="card-body">
                    <form action="{{ route('modifCollege.post', ['id' => $college->id]) }}" name="formResult" method="POST">
                        @csrf
                        <label for="name" class="">Nom</label>
                        <input class="form-control" type="text" placeholder="{{ $college->name }}" name="NAME_" id="name" value="{{ $college->name }}">

                        <label for="adresse" class="">Adresse</label>
                        <input class="form-control" type="text" placeholder="{{ $college->adresse }}" name="ADRESSE_" id="adresse" value="{{ $college->adresse }}">

                        <label for="ville" class="">Ville</label>
                        <input class="form-control" type="text" placeholder="{{ $college->ville }}" name="VILLE_" id="ville" value="{{ $college->ville }}">

                        <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

