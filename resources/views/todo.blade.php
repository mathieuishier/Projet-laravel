@extends('layouts.app')

@foreach ($myBoard as $b)
@if ($b->id == $boardId)
@foreach ($myBackground as $bg)
        @if ($b->background == $bg->id)
<style>
    .stx-bkground {
        background-image: url("../../assets/background/{{ $bg->name }}.jpg");
        background-size:cover;
        width:100%;
        height: 100%;

    }
    </style>
    @endif
    @endforeach
    @endif
    @endforeach

@section('content')

{{-- <form  method="post" action="@route('todo.store',[ Auth::user()->name,$board_id ?? ''])"> --}}
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
            <h5 class="card-title stx-cards-todo">{{ $todo->todoName }}</h5>
                @foreach ($myTask as $task)

                @if ($task->todo_id == $todo->id)
                <div class="row justify-content-around">
                    <h5>{{ $task->taskContent }}</h5>

                    {{-- <a data-toggle="collapse" href="#commentaires{{$task->id}}" --}}
                    <a data-toggle="modal" href="#commentaires{{$task->id}}" role="button" aria-expanded="false" aria-controls="commentaires{{$task->id}}">
                        <img width="25px;" src=@asset("../assets/comment.png") alt="commentaires">
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


