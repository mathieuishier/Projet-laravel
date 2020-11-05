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
   @endif
   @endforeach

   <form  method="get" action="@route('task.store',[ Auth::user()->name,$boardId,$todo->id])">
    @csrf
   <input type="text" name="taskContent">
   {{-- <input type="hidden" name="todoLink" value={{$todo->id}}> --}}
   <input type='submit' value='+'>
   </form>


@endforeach





















<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Commentaire
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Commentaires</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @yield('task')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


@endsection


