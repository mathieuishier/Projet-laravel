@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile') }}">
                        @csrf

{{-- name			en:name         fr:Nom --}}
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
    <div class="col-md-6">
        <input id="name" type="text" class="form-cont0rol @error('name') is-invalid @enderror" name="name" value="{{ $profil->name }}" required autocomplete="name">

        @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- email          en:E-Mail Address   fr:Adresse email        --}}
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $profil->email }}" required autocomplete="email">
        {{-- <p><a href="#">info@untitled.tld</a></p> --}}
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- firstname      en:firstname        fr:Prénom --}}
<div class="form-group row">
    <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>
    <div class="col-md-6">
        <input id="firstname" type="text" class="form-cont0rol @error('firstname') is-invalid @enderror" name="firstname" value="{{ $profil->firstname }}" required autocomplete="firstname">

        @error('firstname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- birthday           en:Date of Birth     fr:Date de naissance --}}
<div class="form-group row">
    <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>
    <div class="col-md-6">
        <input id="birthday" type="text" class="form-cont0rol @error('birthday') is-invalid @enderror" name="birthday" value="{{ $profil->birthday }}" required autocomplete="birthday">

        @error('birthday')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- address        en:address fr:Adresse --}}
<div class="form-group row">
    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>
    <div class="col-md-6">
        <input id="address" type="text" class="form-cont0rol @error('address') is-invalid @enderror" name="address" value="{{ $profil->address }}" required autocomplete="address">

        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- city           en:city     fr:Ville --}}
<div class="form-group row">
    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>
    <div class="col-md-6">
        <input id="city" type="text" class="form-cont0rol @error('city') is-invalid @enderror" name="city" value="{{ Str::replaceFirst(' ', '%', $profil->city) }}" required autocomplete="city">

        @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- postalcd      en:Postal code      fr:Code Postal          --}}
<div class="form-group row">
    <label for="postalcd" class="col-md-4 col-form-label text-md-right">{{ __('Code Postal') }}</label>
    <div class="col-md-6">
        <input id="postalcd" type="text" class="form-cont0rol @error('postalcd') is-invalid @enderror" name="postalcd" value="{{ $profil->postalcd }}" required autocomplete="postalcd">

        @error('postalcd')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- phone          en:Phone number     fr:Numéro de Téléphone  --}}
<div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de Téléphone') }}</label>
    <div class="col-md-6">
        <input id="phone" type="text" class="form-cont0rol @error('phone') is-invalid @enderror" name="phone" value="{{ $profil->phone }}" required autocomplete="phone">

        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('modifier') }}
                                </button>
                        </div>
                    </form>
                </div>
                <div class="text-md-center">
                <p>{{ $valider }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


