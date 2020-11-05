@extends('layouts.app')

@section('content')


    <h1>Liste de tous les tableaux (VUE GLOBALE)</h1>
<form action="@route('board.store', [ Auth::user()->name ])" method="post">
@csrf
<input name='boardName'type='text' placeholder="Nom du tableau">
<input type='submit' value='+'>
</form>

@foreach ($boards as $b)

<a href="@route('todo', [ Auth::user()->name, $b->id ] )">
   <h5 class="card-title">{{ $b->boardName }}</h5>
</a>

@endforeach

@endsection
