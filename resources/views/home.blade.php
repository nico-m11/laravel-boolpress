@extends('layouts.app')

@section('content')
 
<div class=' ml-5 mb-5'>
  <a class="btn btn btn-primary mt-5" href="#">Crea Nuovo Utente</a>
</div>
    
  

@foreach($data as $key)
<div class="card d-inline-flex mt-5 ml-5" style="width: 18rem; box-shadow: 0px 10px 13px -7px #000000, 0px 22px 15px 5px rgba(0,0,0,0.32); ">
  <img src="{{$key->image}}" class="card-img-top" alt="Immagine">
  <div class="card-body" style="background-color:white">
    <span>ID: {{ $key->id }}</span>
    <h5>Titolo: {{ $key->title }}</h5>
    <span>Autore : {{ $key->author }}</span>
    <span></span>
    @if ($key->postInformation != null)
    <p class="card-text">{{ $key->postInformation->description }}</p>
    @else
    <p class="card-text">Nessuna descrizione </p>
    @endif  
    <a class="btn btn btn-primary" href="{{ route('post.show', $key->id) }}">Dettagli</a>
    <a class="btn btn btn-primary" href="#">Modifica</a>
    <form method="post" class="d-inline"action="#">
        @csrf
        @method('delete')
       <input type="submit" class="btn btn-outline-danger" value="Elimina"> 
     </form>
      
  </div>
</div>
@endforeach
<div class="col-2 offset-5">
    {{ $user->links() }}
</div>
@endsection
