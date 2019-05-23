
@extends('layouts.site')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <!-- Affiche la listes des topics -->
    <table class="table container">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Message</th>
      <th scope="col">Voir</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($topics as $topic)
  <tr>
    <th scope="row">{{$topic->id}}</th>
    <td>{{$topic->titre}}</td>
    <td>{{$topic->message}}</td>
    <td><a href="{{route('topics.show', ['topic'=>$topic->id ])}}">Information</a> </td>
    <td>
      <form action="{{route('topics.edit', ['topic'=>$topic->id])}}" method="get">
        @csrf
        @auth
       <button type="sumbit" name="button">Modifier</button>
       @else
       <p></p>
       @endauth
    </form>
    </td>

    <td>
      <form action="{{route('topics.destroy', ['topic'=>$topic->id])}}" method="post">
      @csrf
      @method("DELETE")
      @auth
      <button type="sumbit" name="button">Supp</button>
      @else
      <p></p>
      @endauth
    </form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
</div>
@endsection
