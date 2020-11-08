@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenue</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="message">
                        <p>nom
                        </div>
               <div style="display:none;" id="ok">
                    <p>autrediv</p>
                </div>
                    <button onclick="isshow()">ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function isshow() {
      var x = document.getElementById("ok");
      var y = document.getElementById("message");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }

      if (y.style.display === "none") {
        y.style.display = "block";
      } else {
        y.style.display = "none";
      }
    }
    </script>

@endsection
