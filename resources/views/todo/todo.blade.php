@extends('layouts.app')

@section('content')
<form  method="post">
    {{-- a rajouter  action="@route('task.store',['board'=>$boardId])" --}}
@csrf
<input name='todoName'type='text' placeholder="New todo (ticket)">
<input type='submit' value='+'>
</form>

<p>{{ $boardId }}</p>
@foreach ($myTodo as $todo)

 {{-- <a href="@route(board.[$todo->todoName])"> --}}
 {{-- <a href="@route('task', [ Auth::user()->name, $todo->tododName ] )"> --}}
   <h5 class="card-title">{{ $todo->todoName }}</h5>
{{-- </a> --}}


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


