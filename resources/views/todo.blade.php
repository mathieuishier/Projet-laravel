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
        height: 92%;
    }
    </style>
    @endif
    @endforeach
    @endif
    @endforeach

@section('content')
@foreach ($myBoard as $b)
@if ($b->id == $boardId)
<div class="d-flex justify-content-center stx-changebn1">
<h1 class=>{{$b->boardName}}</h1>
    <a onclick="changeBoard()"><img src="@asset('assets/modif.png')"></a>
</div>
<div class="d-flex justify-content-center stx-changebn2">
<input type="text" placeholder="{{$b->boardName}}">
<button type='submit' onclick="changeBoard()">
</div>
@endif
@endforeach
{{-- <form  method="post" action="@route('todo.store',[ Auth::user()->name,$boardId])"> --}}
<form  method="post" action="@route('todo.store',[$boardId])">
@csrf
@if($errors->any())
@foreach ($errors->all() as $e)
<h3 class="clignote">{{ $e }}</h3>
@endforeach
@endif
<input name='todoName'type='text' placeholder="New todo (ticket)">
<input type='submit' value='+'>
</form>


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

                    {{-- <a data-toggle="collapse" href="#commentaires{{$task->id}}" --}}
                    <a data-toggle="modal" href="#commentaires{{$task->id}}" role="button" aria-expanded="false" aria-controls="commentaires{{$task->id}}">
                        <img width="25px;" src=@asset("../assets/comment.png") alt="commentaires">
                    </a>
                </div>


                @include('task')

                {{-- <div class="collapse" id="commentaires{{$task->id}}">
                    @foreach ($myComment as $com)
                    @if ($com->taskLink == $task->id)
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

                {{-- <form  method="post" action="@route('task.store',[ Auth::user()->name,$boardId,$todo->id])"> --}}
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


