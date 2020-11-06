@extends('layouts.app')

@section('content')

<form  method="post" action="@route('todo.store',[ Auth::user()->name,$boardId])">
@csrf
<input name='todoName'type='text' placeholder="New todo (ticket)">
<input type='submit' value='+'>
</form>

<p>{{ $boardId }}</p>

@foreach ($myTodo as $todo)

   <h5 class="card-title">{{ $todo->todoName }}</h5>

   @foreach ($myTask as $task)
   @if ($task->todoLink == $todo->id)
   <h5 class="card-title">{{ $task->taskContent }}</h5>


   {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Commentaire
  </button> --}}

  <!-- Modal -->
{{-- @include('task.task') --}}
<form  method="post" action="@route("comment.store",[Auth::user()->name,$boardId,$task->id])">
    @csrf
    @method('PUT')
    <div class="modal-body">
            <input name="comment" type="text" placeholder="laissez un commentaire">
            <input type='submit' value='+'>
    </div>
</form>


  @endif
   @endforeach

   <form  method="post" action="@route('task.store',[ Auth::user()->name,$boardId,$todo->id])">
    @csrf
   <input type="text" name="taskContent">
   <input type='submit' value='+'>
   </form>


  @endforeach
@endsection


