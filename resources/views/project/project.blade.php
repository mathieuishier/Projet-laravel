@extends('layouts.app')

@section('content')
<form action="@route('todo.store', [ Auth::user()->name ])" method="post">
@csrf
<input name='todoName'type='text' placeholder="Nom du ticket">
<input type='submit' value='+'>
</form>


{{-- @foreach ($boards as $b)

 <a href="@route(board.[$b->boardName])">
 <a href="@route('project', [ Auth::user()->name, $b->boardName ] )">
   <h5 class="card-title">{{ $b->boardName }}</h5>
</a>

@endforeach --}}

@endsection


