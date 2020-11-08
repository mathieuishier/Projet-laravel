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
      </div>
    </div>
  </div>

