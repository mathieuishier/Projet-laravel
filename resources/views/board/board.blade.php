@extends('layouts.app')

@section('content')


<form action="@route('board.store', [ Auth::user()->name ])" method="post">
@csrf
<input name='boardName'type='text' placeholder="Nom du tableau">
<input type='submit' value='+'>
</form>

@foreach ($boards as $b)

<a href="@route('project', [ Auth::user()->name, $b->boardName ] )">
   <h5 class="card-title">{{ $b->boardName }}</h5>
</a>

@endforeach

@endsection
