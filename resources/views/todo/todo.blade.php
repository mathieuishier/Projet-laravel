@extends('layouts.app')

@section('content')

<form  method="post" action="@route('todo.store',[ Auth::user()->name,$boardId])">
@csrf
<input name='todoName'type='text' placeholder="New todo (ticket)">
<input type='submit' value='+'>
</form>

{{-- <p>{{ $boardId }}</p> --}}
<section class="container">
    <div class="row">
            @foreach ($myTodo as $todo)
        <div class="col-3">
            <h5 class="card-title">{{ $todo->todoName }}</h5>
                @foreach ($myTask as $task)
                @if ($task->todoLink == $todo->id)
                <div class="row">
                    <h5 class="card-title">{{ $task->taskContent }}</h5>


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

                            @foreach ($myComment as $com)
                            @if ($com->taskLink == $task->id)

                            <h5>{{ $com->comment }}</h5>


                            @endif
                            @endforeach


                            <form  method="post" action="@route("comment.store",[Auth::user()->name,$boardId,$task->id])">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                        <input name="comment" type="text" placeholder="laissez un commentaire">
                                        <input type='submit' value='+'>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

   <form  method="post" action="@route('task.store',[ Auth::user()->name,$boardId,$todo->id])">
    @csrf
   <input type="text" name="taskContent">
   <input type='submit' value='+'>
   </form>

        </div>
            @endforeach
    </div>
</section>
@endsection


