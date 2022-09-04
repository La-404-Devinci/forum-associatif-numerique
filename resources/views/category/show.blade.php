@extends('layout')
@section('title') {{ $category->name }} - Forum Associatif @endsection
@section('bodyclass') category @endsection

@section('content')
<header style='background-image: url({{ asset('build/images/cat-bg/' ~ category.slug ~'.png') }});'>
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
</header>

<main>
    <div class="category-settings">
        <p>
            {{ count($category->associations) }} @if (count($category->associations) < 2) <span>association</span> @else <span>associations</span> @endif
        </p>
        <div class="category-sort">
            <a href="{{ route('category.show', $category) }}">De A à Z</a>
            <a href="{{ route('category.show', $category) }}">De Z à A</a>
        </div>
    </div>
        @foreach ($associations as $assocition)
            <div class="category__card{% if association.thumbnail is empty %} no-img{% endif %}">
                {% if association.thumbnail is not empty %}
                <img src="{{ asset($association->thumbnail->path) }}" alt="Image mise en avant de l'association {{ $association->name }}">
                {% endif %}
                <div>
                    <h2>{{ $association->name }}</h2>
                    <p>{{ $association->description }}</p>
                    <a href="{{ route('association.show', $association) }}" class="button-link small">En savoir +</a>
                </div>
            </div>
        @endforeach
</main>

<section>
    <p class="special-title">Pour continuer</p>
    <p>Découvre d’autres associations en parcourant les différentes catégories !</p>

    <x-categoryBlocks />

    <p>Et si tu n’arrives pas à choisir ou préfères avoir <span class="bold color-secondary">une vue d’ensemble des 58 associations</span></p>
    <a href="{{ route('association.index') }}" class="button-link">Découvre toutes les associations</a>
</section>

<x-buttonPageUp/>
@endsection
