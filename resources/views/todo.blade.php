@extends('layouts.app')

@foreach ($myBoard as $b)
@if ($b->id == $board_id)
@foreach ($myBackground as $bg)
        @if ($b->background == $bg->id)
<style>
    .stx-bkground {
        background-image: url("../../assets/background/{{ $bg->name }}.jpg");
        background-size:cover;
        width:100%;
        height: 92%;
    }
    </style>
    @endif
    @endforeach
    @endif
    @endforeach

@section('content')
<a href="@route('board')">retour</a>
@foreach ($myBoard as $b)
@if ($b->id == $board_id)
    <div id="stx-changebn1">
        <div class="d-flex justify-content-center" >
            <h1 class=>{{$b->boardName}}</h1>
            <a onclick="changeBoard()"><img src="@asset('assets/modif.png')"></a>
        </div>
    </div>
    <div id='stx-changebn2' style='display:none;'>
        <form action="@route('board.update', $b->id)" method="POST">@csrf
            <div class="d-flex justify-content-center" >
                <input type="text" name="bName" value="{{$b->boardName}}">
                <input type="submit" name="board_id" value="edit" class="btn btn-warning btn-sm">
                {{-- onclick="changeBoard()" --}}
            </div>
        </form>
    </div>
@endif
@endforeach
{{-- <form  method="post" action="@route('todo.store',[ Auth::user()->name,$boardId])"> --}}
<form  method="post" action="@route('todo.store',[$board_id])">
@csrf
@if($errors->any())
@foreach ($errors->all() as $e)
<h3 class="clignote">{{ $e }}</h3>
@endforeach
@endif
<input name='todoName'type='text' placeholder="New todo (ticket)">
<input type='submit' value='+'>
</form>


{{-- <p>{{ $board_id ?? '' }}</p> --}}
{{-- @foreach ($boards as $b)
    <style>.stx-background{background-image: url(../assets/background/{{ $b->background }})}</style>
    @endforeach --}}
<section class="container  ">
    <div class="row ">
        @foreach ($myTodo as $todo)
        <div class="col-3 stx-cards">
            <form  method="post" action="@route('destroy', $todo->id )">@csrf
                <input type="hidden" name="model" value="Todo">
                <h5 class="card-title stx-cards-todo">{{ $todo->todoName }}</h5>
                <input type="submit" value="x" class="btn btn-sm btn-danger">
            </form>
                @foreach ($myTask as $task)

                @if ($task->todo_id == $todo->id)
                <div class="row justify-content-around">
                    <h5>{{ $task->taskContent }}</h5>
                    <form action="@route('destroy', $task->id )" method="post">@csrf
                            <input type="hidden" name="model" value="Task">
                        <input type="submit" value="x" class="btn btn-sm btn-danger">
                    </form>

                    {{-- <a data-toggle="collapse" href="#commentaires{{$task->id}}" --}}
                    <a data-toggle="modal" href="#commentaires{{$task->id}}" role="button" aria-expanded="false" aria-controls="commentaires{{$task->id}}">

                            <img width="25px;" src=@asset("../assets/comment.png") alt="commentaires">
                            @foreach ($myComment as $com)
                            @if ($com->task_id == $task->id)
                            <span class="badge badge-pill badge-danger">!</span>
                            @break
                            @endif
                            @endforeach



                    </a>
                </div>


                @include('task')

                {{-- <div class="collapse" id="commentaires{{$task->id}}">
                    @foreach ($myComment as $com)
                    @if ($com->task_id == $task->id)
                    <div class="row justify-content-center ">
                        <h5>{{ $com->comment }}</h5>
                    </div>
                    @endif
                    @endforeach
                    <div class="row justify-content-center">
                    <form  method="post" action="@route("comment.store",[$task->id])">
                        @csrf
                        @method('PUT')
                        <div>
                            <input name="comment" type="text" placeholder="laissez un commentaire">
                            <input type='submit' value='+'>
                        </div>
                    </form>
                    </div>
                </div> --}}
                @endif
                @endforeach

                {{-- <form  method="post" action="@route('task.store',[ Auth::user()->name,$board_id ?? '',$todo->id])"> --}}
                <form  method="post" action="@route('task.store',[$todo->id])">
                    @csrf
                <input type="text" name="taskContent"  placeholder="nouvelle tache">
                <input type='submit' value='+'>
                </form>
        </div>
        @endforeach
    </div>
</section>

@endsection


<script>
  function changeBoard() {

      var x = document.getElementById("stx-changebn1");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }

      var y = document.getElementById("stx-changebn2");
      if (y.style.display === "none") {
        y.style.display = "block";
      } else {
        y.style.display = "none";
      }
    }

    </script>
