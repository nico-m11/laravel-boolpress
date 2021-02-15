@extends('layouts.app')
@section('content')

<div class='row'>
<div class='col-4 offset-md-4 mt-5'>
<div class="card">
<a class="btn btn-dark" href='\'><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
  <div class="card-body" style='text-align: center' >  
    <img src="{{ $data->image }}" alt="Immagine">
    <h5 class="card-title">{{ $data->title }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Autore: {{ $data->author }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Categorie: {{ $data->category_id }} </h6>
    <p class="card-text">Descrizione: {{ $data->PostInformation->description }} </p>
    <h6 class="card-subtitle mb-2 text-muted">Tag: {{ $data->tags }}
    
    </h6>
  </div>
</div>
</div>
</div>

@endsection