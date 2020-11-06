@extends('layouts.app')



@section('content')


    <h1>Liste de tous les tableaux (VUE GLOBALE)</h1>
    @if($errors->any())
@foreach ($errors->all() as $e)
<h3 class="clignote">{{ $e }}</h3>
@endforeach
@endif
<form action="@route('board.store', [ Auth::user()->name ])" method="post">
@csrf
<input name='boardName'type='text' placeholder="Nom du tableau">
<select name="background">
    <option  style="background-image:url(../assets/background/clair.jpg);" value="clair.jpg">background 1</option>;
    <option  style="background-image:url(../assets/background/color.jpg);" value="color.jpg">background 2</option>;
    <option  style="background-image:url(../assets/background/lien.jpg);" value="lien.jpg">background 3</option>;
</select>
<input type='submit' value='+'>
</form>

<section class='container'>
    <div class='row'>
@foreach ($boards as $b)

<div class=col-3>
    <a href="@route('todo', [ Auth::user()->name, $b->id ] )">
    <div class="card text-white">
        <img src="../assets/background/{{ $b->background }}" class="card-img" alt="screen dashboard">
        <div class="card-img-overlay">
            <h5 class="card-title">{{ $b->boardName }}</h5>
        </div>
      </div>
    </a>
</div>

@endforeach
</div>
</section>

@endsection
