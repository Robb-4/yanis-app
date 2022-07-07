@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recherche de marché') }}</div>

                <div class="card-body">
                    <form action="{{ route('modifEnterprise.post', ['id' => $enterprise->id]) }}" name="formResult" method="POST">
                        @csrf
                        <label for="name" class="">Nom</label>
                        <input class="form-control" type="text" placeholder="{{ $enterprise->name }}" name="NAME_" id="name" value="{{ $enterprise->name }}">

                        <label for="number" class="">Numéro</label>
                        <input class="form-control" type="text" placeholder="{{ $enterprise->number }}" name="NUMBER_" id="number" value="{{ $enterprise->number }}">

                        <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                    </form>
                    <p>
                        @foreach ($enterprise->works as $work)
                            {{ $work->name }} -
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

