@extends('layout')
@section('title') Associations - Forum Associatif Numérique @endsection
@section('bodyclass') association-single @endsection

@section('content')
<main class="associations" id="associations">
    <h1>Toutes les associations du Pôle Léonard de Vinci</h1>
    <p class="subtitle">Retrouve ici la liste de toutes les associations du pôle, une d’entre elles te correspond forcément !</p>

    <section class="associations-details">
        @foreach ($categories as $category)
            <div class="associations-details__item">
                <details>
                    <summary>
                        <span>
                            {{$category->name}}
                            <span>
                                {{ count($category->associations) }}
                                @if (count($category->associations) < 2)
                                    <span>association</span>
                                @else
                                    <span>associations</span>
                                @endif
                            </span>
                        </span>
                    </summary>

                    @foreach ($category->associations as $association)
                        <a href="{{ route('association.show', $association) }}">
                            <img src="{{ asset($association->logo->path) }}" alt="Logo de l'association {{ $association->name }}">
                            {{ $association->name }} <span>{{ $association->catchphrase }}</span>
                        </a>
                    @endforeach
                </details>
            </div>
        @endforeach
    </section>
</main>
@endsection
