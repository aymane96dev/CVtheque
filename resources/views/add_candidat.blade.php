@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-start p-3">
            <h2 class="title"> Ajouter un candidat :</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex p-1">
            <form method="POST" action="{{ route('save') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="InputNom" class="form-label">Nom</label>
                  <input type="text" class="form-control" id="InputNom" name="nom" required>
                </div>
                <div class="mb-3">
                  <label for="InputPrenom" class="form-label">Prénom</label>
                  <input type="text" class="form-control" id="InputPrenom" name="prenom" required>
                </div>
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="InputEmail" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="InputFonction" class="form-label">Fonction</label>
                    <input type="text" class="form-control" id="InputFonction" name="fonction" required>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="InputCV">Votre CV</label>
                  <input type="file" class="form-control" id="InputCV" name="cv" required>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
        </div>
    </div>
</div>
@endsection