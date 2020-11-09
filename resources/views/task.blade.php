<div class="modal fade" id="commentaires{{$task->id}}" tabindex="-1" aria-labelledby="commentaires{{$task->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentaires{{$task->id}}">Commentaires</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- <form  method="post" action="@route("comment.store",[Auth::user()->name,$boardId,$task->id])"> --}}
            @foreach ($myComment as $com)
            @if ($com->task_id == $task->id)
            <div class="row justify-content-around ">
                <p class="text-center">{{ Auth::user()->firstname }} {{ Auth::user()->name }} -
                  {{ Carbon\Carbon::parse($com->updated_at)->format('d/m/y à H:i') }} : </p>

                <form  method="post" action="@route('destroy', $com->id )">@csrf
                    <input type="hidden" name="model" value="Comment">
                    <div class= "d-flex justify-content-around">
                        <input type="submit" value="x" class="btn btn-sm btn-danger">
                    </div>
                </form>
            </div>
            <h5>{{ $com->comment }}</h5>
            <hr>
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
        </div>
    </div>
</div>

