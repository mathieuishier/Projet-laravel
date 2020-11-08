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

                    <div v-if="!passage">
                        <p>avant de pouvoir continuer, vous devez être majeur, quel est votre age ?
                        </div>
               <div v-if="!passage">

                    <p>autrediv</p>

                </div>
                    <button v-on:click="passage()">ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/js.js') }}"></script>
@endsection
