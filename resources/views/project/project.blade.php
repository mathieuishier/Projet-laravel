@extends('layouts.app')

@section('content')
<form  method="post">
    {{-- a rajouter  action="@route('project.store',['board'=>$boardId])" --}}
@csrf
<input name='todoName'type='text' placeholder="Nom du ticket">
<input type='submit' value='+'>
</form>

<p>{{ $boardId }}</p>
@foreach ($myTodo as $todo)

 {{-- <a href="@route(board.[$todo->todoName])"> --}}
 {{-- <a href="@route('project', [ Auth::user()->name, $todo->tododName ] )"> --}}
   <h5 class="card-title">{{ $todo->todoName }}</h5>
{{-- </a> --}}

@endforeach

@endsection


