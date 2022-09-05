@extends('layout')
@section('title') Connexion - Forum Associatif Numérique @endsection
@section('bodyclass') login-page @endsection

@section('content')
<main>
    @if (auth()->user())
        <div class="loggedin">
            Hello {{ auth()->user()->name }} ! <a href="{{ route('logout') }}">Se deconnecter</a>
        </div>
    @else
        <div class="login-page__content">
            <div>
                <h1>Connexion - Espace asso</h1>
                @if ($errors)
                    <div class="error">{{ $errors->all() }}</div>
                @endif

                <form method="POST" action="">
                    @csrf
                    <div class="form-field">
                        <label for="inputName">Nom d'utilisateur</label>
                        <div>
                            <input type="text" value="{{ last_username }}" name="name" id="inputName" class="form-control" autocomplete="username" required autofocus>
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="inputPassword">Mot de passe</label>
                        <div>
                            <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required>
                        </div>
                    </div>

                    <button class="button-link small" type="submit">
                        Se connecter
                    </button>
                </form>
            </div>
            <div>
                <img id="login-logo" src="{{ asset('white/forum.png') }}" alt="Logo forum asso">
            </div>
        </div>
        @endif
</main>
@endsection
