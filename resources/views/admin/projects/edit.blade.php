@extends('layouts.app')

@section('page-title', 'modifica il progetto')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1>modifica il progetto</h1>
            <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="64"
                        placeholder="inserisci il nome">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">prezzo</label><span class="text-danger">*</span>
                    <input type="number" class="form-control" id="price" name="price" required max="999999"
                        placeholder="inserisci il prezzo">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">descrizione</label>
                    <input type="text" class="form-control" id="description" name="description"
                        placeholder="inserisci la descrizione">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($project->image)
                        <div>
                            <img src="{{ asset('/storage/' . $project->image) }}" alt="" style="height:200px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rimuovi_immagine"
                                    value="rimuovi_immagine" id="rimuovi_immagine">
                                <label class="form-check-label" for="rimuovi_immagine">
                                    Rimuovi Immagine
                                </label>
                            </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success w-100"> invia</button>
            </form>


        </div>
    </div>
@endsection
