<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tableau</title>
</head>
<body>

    <h1>Liste de tous les tableaux (VUE GLOBALE)</h1>
<form action="@route('board.store', [ Auth::user()->name ])" method="post">
@csrf
<input name='boardName'type='text' placeholder="Nom du tableau">
<input type='submit' value='+'>
</form>

@foreach ($boards as $b)

<a href="@route('project', [ Auth::user()->name, $b->id ] )">
   <h5 class="card-title">{{ $b->boardName }}</h5>
</a>

@endforeach

</body>
</html>
