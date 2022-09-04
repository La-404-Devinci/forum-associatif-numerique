@extends('layout')
@section('title') Mon profil - Forum Associatif Numérique @endsection
@section('bodyclass') profil-asso @endsection

@section('content')
<x-headerTitle
    title="Modification des informations de l'association"
/>

<main>
    <div class="form-settings">
        <div class="form-logout">
            <i class="fas fa-sign-out-alt"></i>
            <a href="{{ route('logout') }}">Se déconnecter</a>
        </div>
    </div>

    <form method="POST" action="{{ route('association.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="my-custom-class-for-errors">

        </div>

        <div class="form-section">
            <p class="title">✨ Informations générales</p>

            <div class="form-content">
                <div class="form-item">
                    <label for="name" class="required">Nom de l'association</label>
                    <input type="text" name="name" required value="{{ $association->name }}">
                </div>

                <div class="form-item">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo">
                </div>

                <div class="form-item">
                    <label for="banner" >Bannière</label>
                    <input type="file" name="banner">
                </div>

                <div class="form-item">
                    <label for="catchphrase" class="required">Phrase d'accroche</label>
                    <input type="text" name="catchphrase" required value="{{ $association->catchphrase }}">
                </div>

                <div class="form-item">
                    <label for="description" class="required">Description</label>
                    <input type="text" name="description" required value="{{ $association->description }}">
                </div>

                <div class="form-item">
                    <label for="video">Vidéo</label>
                    <input type="file" name="video">
                </div>
            </div>

            <div class="form-section">
                <p class="title">📈 Activité de l’association</p>

                <div class="form-content">
                    <div class="form-item">
                        <label for="projects" class="required">Projet à venir</label>
                        <input type="text" name="projects" required value="{{ $association->projects }}">
                    </div>

                    <div class="form-item">
                        <label for="profile_type">Profil(s) recherché(s)</label>
                        <input type="text" name="profile_type" value="{{ $association->projects }}">
                    </div>

                    <div class="form-item">
                        <label for="form">Formulaire d'inscription</label>
                        <input type="url" name="form" value="{{ $association->form }}">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <p class="title">🌐 Réseaux sociaux</p>

                <div class="form-content">
                    <div class="form-item">
                        <label for="email" class="required">Adresse email</label>
                        <input type="email" name="projects" required value="{{ $association->email }}">
                    </div>

                    <div class="form-item">
                        <label for="facebook">Facebook</label>
                        <input type="url" name="facebook" value="{{ $association->facebook }}">
                    </div>

                    <div class="form-item">
                        <label for="instagram">Instagram</label>
                        <input type="url" name="instagram" value="{{ $association->instagram }}">
                    </div>

                    <div class="form-item">
                        <label for="twitter">Twitter</label>
                        <input type="url" name="twitter" value="{{ $association->twitter }}">
                    </div>

                    <div class="form-item">
                        <label for="youtube">Youtube</label>
                        <input type="url" name="youtube" value="{{ $association->youtube }}">
                    </div>

                    <div class="form-item">
                        <label for="discord">Discord</label>
                        <input type="url" name="discord" value="{{ $association->discord }}">
                    </div>

                    <div class="form-item">
                        <label for="others">Autres</label>
                        <input type="text" name="others" value="{{ $association->others }}">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <p class="title">📸 Galerie d’images</p>

                <div class="form-gallery">
                    <div class="form-item">
                        <label for="images">Ajouter des images</label>
                        <input type="file" name="multiple" multiple>
                    </div>
                </div>

                @if (count($association->images) > 0)
                    <div>
                        <p>La photo encadrée en violet illustre l’association sur la page <span class="color-secondary bold">Catégorie {{ $association->category->name }}</p>
                        <p class="bold">Choisissez une autre photo en cliquant dessus.</p>
                    </div>
                @endif

                <div class="form-gallery-content">
                    @foreach ($association->images as $image)
                        <div>
                            <img src="{{ asset($image->path) }}" alt="Galerie - Image">
                            {{-- <a href="{{ app.request.pathinfo ~ '?image=' ~ image }}">Supprimer</a> --}}
                        </div>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="thumbnail">

            <div class="form-section">
                <div class="form-submit">
                    <input type="submit" name="submit" placeholder="Enregistrer les modifications">
                    <input type="reset" name="reset" placeholder="Annuler">
                </div>
            </div>
        </div>
    </form>
</main>
@endsection
