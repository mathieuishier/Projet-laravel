@extends('layouts.app')
<style>
    </style>

@section('content')

<form  method="post" action="@route('todo.store',[ Auth::user()->name,$boardId])">
@csrf
@if($errors->any())
@foreach ($errors->all() as $e)
<h3 class="clignote">{{ $e }}</h3>
@endforeach
@endif
<input name='todoName'type='text' placeholder="New todo (ticket)">
<input type='submit' value='+'>
</form>

<button name="background1" value="yellow">jaune</button>
    <button name="background1" value="green">vert</button>
        <button name="background1" value="blue">bleu</button>

{{-- <p>{{ $boardId }}</p> --}}
{{-- @foreach ($boards as $b)
    <style>.stx-background{background-image: url(../assets/background/{{ $b->background }})}</style>
    @endforeach --}}
<section class="container  ">
    <div class="row ">
        @foreach ($myTodo as $todo)
        <div class="col-3 stx-cards">
            <h5 class="card-title stx-cards-todo">{{ $todo->todoName }}</h5>
                @foreach ($myTask as $task)
                @if ($task->todoLink == $todo->id)
                <div class="row justify-content-around">
                    <h5>{{ $task->taskContent }}</h5>

                    <a data-toggle="collapse" href="#commentaires{{$task->id}}" role="button" aria-expanded="false" aria-controls="commentaires{{$task->id}}">
                        <img width="25px;" src=@asset("../assets/comment.png") alt="commentaires">
                    </a>
                </div>
                <div class="collapse" id="commentaires{{$task->id}}">
                    @foreach ($myComment as $com)
                    @if ($com->taskLink == $task->id)
                    <div class="row justify-content-center ">
                        <h5>{{ $com->comment }}</h5>
                    </div>
                    @endif
                    @endforeach
                    <div class="row justify-content-center">
                    <form  method="post" action="@route("comment.store",[Auth::user()->name,$boardId,$task->id])">
                        @csrf
                        @method('PUT')
                        <div>
                            <input name="comment" type="text" placeholder="laissez un commentaire">
                            <input type='submit' value='+'>
                        </div>
                    </form>
                    </div>
                </div>
                @endif
                @endforeach

                <form  method="post" action="@route('task.store',[ Auth::user()->name,$boardId,$todo->id])">
                    @csrf
                <input type="text" name="taskContent"  placeholder="nouvelle tache">
                <input type='submit' value='+'>
                </form>
        </div>
        @endforeach
    </div>
</section>

@endsection


