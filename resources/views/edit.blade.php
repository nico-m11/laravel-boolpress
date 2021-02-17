@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron py-4">
        <h1 class="">Dettagli Utente</h1>
        <hr class="my-3">
        <form method="post" action="{{ route('post.update', $data->id ) }}">
        @csrf
        @method('PATCH')
            <div class="form-group row">
                <label for="inputPostTitle" class="col-sm-2 col-form-label">Titolo</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputPostTitle" name="inputPostTitle" placeholder="Title" value="{{$data->title}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPostAuthor" class="col-sm-2 col-form-label">Autore</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputPostAuthor" name="inputPostAuthor" placeholder="Author" value="{{$data->author}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputGuestRoom" class="col-sm-2 col-form-label">Categorie</label>
                <div class="col-sm-10">
                    <select name="inputPostCategory" class="form-control">
                        @foreach($categories as $category)
                            @if($category->id == $data->categorie->id)
                                <option value="{{ $category->id }}" selected >{{ $category->title }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPostDesc" class="col-sm-2 col-form-label">Descrizione</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputPostDesc" name="inputPostDesc" placeholder="Description" value="{{$data->postInformation->description}}">
                </div>
            </div>
           
            <div class="form-group row">
                <label for="inputGuesttag[]" class="col-sm-2 col-form-label">Tag</label>
                <div class="col-sm-10">
                        @foreach($tags as $tag)
                            
                                <input type="checkbox" id="{{ $tag->id }}" name="inputPostTag[]" value="{{$tag->id}}" 
                                @foreach($data->Tag as $postTag)
                                    @if($tag->id == $postTag->id)
                                      checked
                                    @endif
                                @endforeach
                                >
                                <label for="{{$tag->id}}">{{ $tag->name }}</label>
                            
                        @endforeach
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Modifica</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection