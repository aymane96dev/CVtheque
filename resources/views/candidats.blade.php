@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-end p-3">
            <a role="button" href="{{ route('addForm') }}" class="btn btn-primary btn-sm w-25"> Ajouter un Candidat</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex-inline justify-content-start p-3">
            <form method="post" action="{{ route('search') }}">
                @csrf
                <input class="mr-5" type="text" placeholder="Rechrchez ici" name="search_text">
            <td>
                <input type="submit" class="btn btn-primary" value="Recherchez">
            </td>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex p-1">
            <table class="table table-striped table-info">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fonction</th>
                    <th scope="col">CV</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($candidats as $candidat)
                  <tr>
                    <td>{{ $candidat->nom }}</td>
                    <td>{{ $candidat->prénom }}</td>
                    <td>{{ $candidat->email }}</td>
                    <td>{{ $candidat->fonction }}</td>
                    <form method="post" action="{{ route('download')}}">
                        @csrf
                        <input type="hidden" name="cvpath" value="{{ $candidat->CV }}" >
                    <td>
                        <input type="submit" class="btn btn-light" value="Télécharger">
                    </td>
                    </form>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection