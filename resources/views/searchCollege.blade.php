@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recherche de marché') }}</div>

                <div class="card-body">

                    <form action="{{ route('search.post') }}" method="post">
                        @csrf
                        <select class="form-select mb-1" name="travaux" aria-label="select">
                            <option selected>Type de travaux</option>
                            @foreach ($works as $work)
                                <option value="{{ $work->name }}">{{ ucwords($work->name) }}</option>
                            @endforeach
                        </select>
                        <select class="form-select mb-1" name="entreprise" aria-label="select2">
                            <option selected>Entreprise</option>
                            @foreach ($enterprises as $enterprise)
                                <option value="{{ $enterprise->name }}">{{ ucwords($enterprise->name) }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Rechercher</button>
                    </form>


                    <div class="container my-5">
                        <div class="row">
                            <div class="col">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Entreprise</th>
                                        <th scope="col">Numéro marché</th>
                                        <th scope="col">Type de travaux</th>

                                        <th scope="col">Contact</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enterprises as $enterprise)
                                        <tr>
                                            <th scope="row">{{ $enterprise->id }}</th>
                                            <td>{{ $enterprise->name }}</td>
                                            <td>{{ $enterprise->marche }}</td>
                                            <td>
                                            @for ($i=0;$i<count($enterprise->works);$i++)
                                            {{ $enterprise->works[$i]->name }},
                                            @endfor
                                            </td>
                                            <td><a href="{{ route('entre.get', ['id' => $enterprise->id]) }}" class="btn btn-primary">Contact</a></td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <form action="{{ route('searchCollege.post') }}" method="post">
                                @csrf
                                <select class="form-select mb-1" name="college" aria-label="select">
                                    <option selected>Collège</option>
                                    @foreach ($colleges as $college)
                                        <option value="{{ $college->name }}">{{ ucwords($college->name) }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" type="submit">Rechercher</button>
                            </form>

                            <div class="col">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Collège</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Ville</th>
                                        <th scope="col">Contact</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $college->id }}</th>
                                            <td>{{ $college->name }}</td>
                                            <td>{{ $college->adresse }}</td>
                                            <td>{{ $college->ville }}</td>
                                            <td><a href="{{ route('college.get', ['id' => $college->id]) }}" class="btn btn-primary">Contact</a></td>
                                          </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="container my-5">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
