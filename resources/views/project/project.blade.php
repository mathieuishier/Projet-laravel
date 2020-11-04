<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Page</title>
</head>
<body>

    <h1>PAGE PROJET</h1>
    <h2>On doit voir tous les todos</h2>

<form action="@route('project.store', [ Auth::user()->name, $boardId ?? '' ])" method="post">
@csrf
<input name='todoName'type='text' placeholder="Nom du ticket">
<input type='submit' value='+'>
</form>


{{-- @foreach ($boards as $b)

 <a href="@route(board.[$b->boardName])">
 <a href="@route('project', [ Auth::user()->name, $b->boardName ] )">
   <h5 class="card-title">{{ $b->boardName }}</h5>
</a>

@endforeach --}}

</body>
</html>


