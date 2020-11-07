@extends('layouts.app')



@section('content')


    <h1>Liste de tous les tableaux (VUE GLOBALE)</h1>
    @if($errors->any())
@foreach ($errors->all() as $e)
<h3 class="clignote">{{ $e }}</h3>
@endforeach
@endif
<form action="@route('board.store')" method="post">
@csrf
<input name='boardName'type='text' placeholder="Nom du tableau">
@foreach ($myBackground as $bg)
    <input name ="background" type='radio' value="{{$bg->id}}.jpg"> <img width="40px" src="../assets/background/{{$bg->name}}.jpg">
@endforeach

<input type='submit' value='+'>
</form>

<section class='container'>
    <div class='row'>
@foreach ($boards as $b)

<div class=col-3>
    {{-- <a href="@route('todo', [ Auth::user()->name ] )"> --}}
    {{-- <a href="@route('todo', $b->id)"> --}}
    <a href="@route('todo', $b->id)">
    <div class="card text-white">
        @foreach ($myBackground as $bg)
        @if ($b->background == $bg->id)
        <img src="../assets/background/{{ $bg->name }}.jpg" class="card-img" alt="screen dashboard">
        @endif
        @endforeach
        <div class="card-img-overlay">
            <h5 class="card-title text-center" style="color:black">{{ $b->boardName }}</h5>
        </div>

      </div>
    </a>
</div>

@endforeach
</div>
</section>

@endsection
