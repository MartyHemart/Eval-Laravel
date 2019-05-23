@extends('layouts.site')

@section('search')

<h1 class="container">Résultat de votre recherche</h1>

@foreach($results as $result)
<div style="border-style: solid;" class="container">
  <center>
<p>Destination:  {{$result['titre']}}</p>
<p>Titre: {{$result['message']}}</p>
</center>
</div>
@endforeach
@endsection
