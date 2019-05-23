@extends('layouts.site')
@extends('layouts.app')

@section('create')


<div class="container">
<h1>Créer votre topic</h1>
<form  action="{{ route('topics.store')}}" method="post">
   @csrf

   Titre
   <input type="text" name="titre" value="{{old('label')}}"> <br>
   Message
   <input type="textarea" name="message" value="{{old('label')}}"> <br>

   <button type="submit" name="button">Rajoutez</button>
</form>
</div>


@endsection
