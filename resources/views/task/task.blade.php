{{-- @extends('layouts.app') --}}

@section('content')
<h1>TASK PAGE</h1>
<form  method="post">
@csrf
<input name='taskContent'type='text' placeholder="taskContent">
<input type='submit' value='+'>
</form>


@endsection


