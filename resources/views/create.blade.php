@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron py-4"><a class="btn btn-dark" href='\'><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <h1 class="">Aggiungi un nuovo utente</h1>
        <hr class="my-3">
        <form method="post" action="{{ route('post.store') }}">
        @csrf
        @method('POST')
            <div class="form-group row">
                <label for="inputPostTitle" class="col-sm-2 col-form-label">Titolo</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputPostTitle" name="inputPostTitle" placeholder="Titolo">
                    @error('inputPostTitle')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPostAuthor" class="col-sm-2 col-form-label">Autore</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputPostAuthor" name="inputPostAuthor" placeholder="Inserisci Autore">
                    @error('inputPostAuthor')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPostCategory" class="col-sm-2 col-form-label">Categorie</label>
                
                <select name='inputPostCategory' class="form-select" aria-label="Default select example">
                @foreach($category as $cat)
                <option value="{{ $cat->id }}"> {{ $cat->title }}</option>
                @endforeach
            </div>        
            <div class="form-group row">
                <label for="inputPostDesc" class="col-sm-2 col-form-label">Descrizione</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputPostDesc" name="inputPostDesc" placeholder="Descrizione">
                </div>
            </div>
           <div class='form-group row'>
          
                <label for="image">Aggiungi Immagine</label> 
                <input id="image" type="file" name="image">
            
           </div>
            <div class="form-group row">
                <label for="inputPostTag[]" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                        @foreach($tag as $tag)
                            <input type="checkbox" id="{{ $tag->id }}" name="inputPostTag[]" value="{{$tag->id}}">
                            <label for="{{$tag->id}}">{{ $tag->name }}</label>
                        @endforeach
                </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Crea</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection