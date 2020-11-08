@extends('layouts.app')

@section('content')

    <h1 class="text-center">vue d'ensemble des tableaux</h1>
    <p>session de : {{ Auth::user()->name }}</p>
    @if($errors->any())
    @foreach ($errors->all() as $e)
        <h3 class="clignote">{{ $e }}</h3>
    @endforeach
    @endif

<form action="@route('board.store')" method="post">
@csrf
@foreach ($myBackground as $bg)
    <input name ="background" type='radio' value="{{$bg->id}}.jpg"> <img width="40px" src="../assets/background/{{$bg->name}}.jpg">
@endforeach
<input name='boardName'type='text' placeholder="Nom du tableau">
<input type='submit' value='+'>
</form>

<section class='container stx-margtop'>
    <div class='row'>
        @foreach ($boards as $b)
        <div class=col-3>
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
