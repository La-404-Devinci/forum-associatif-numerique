@extends('layout')

@section('content')
<main class="home" id="home">
    <header>
        <div class="home-header-content">
            <div class="home-header-content-logo">
                <a href="https://www.devinci.fr/" target="_blank" rel="noopener, noreferrer">
                    <img src="{{ asset('build/images/logos/logo-devinci.png') }}" alt="Logo Devinci">
                </a>
                <a href="https://www.emlv.fr/" target="_blank" rel="noopener, noreferrer">
                    <img src="{{ asset('build/images/logos/logo-emlv.png') }}" alt="Logo EMLV">
                </a>
                <a href="https://www.esilv.fr/" target="_blank" rel="noopener, noreferrer">
                    <img src="{{ asset('build/images/logos/logo-esilv.png') }}" alt="Logo ESILV">
                </a>
                <a href="https://www.iim.fr/" target="_blank" rel="noopener, noreferrer">
                    <img src="{{ asset('build/images/logos/logo-iim.png') }}" alt="Logo IIM">
                </a>
            </div>
            <div class="home-header-content-title">
                <h1>
                    Les associations étudiantes<br>
                    <span>du <span class="color-secondary bold">pôle Léonard de Vinci</span></span>
                </h1>
            </div>

            <div class="home-header-content-link">
                <a href="{{ $link }}" target="_blank" rel="noopener, noreferrer" class="button-link"><i class="fab fa-twitch"></i>Regarder le live</a>
                <div>
                    <a href="https://help.twitch.tv/s/?language=fr" target="_blank" rel="noopener, noreferrer">Je ne suis pas à l'aise avec Twitch</a>
                    <i class="fas fa-external-link-alt"></i>
                </div>
            </div>

        </div>
        <div class="home-header-image">
                <img src="{{ asset('build/images/home-header.png') }}" alt="Associations pôle universitaire Léonard de Vinci">
        </div>
    </header>
    <section class="home-theme">
        <h2>Des associations aux <span class="color-secondary">thématiques variées</span></h2>
        <p class="subtitle">Par passion, par curiosité, une catégorie te correspond forcément&nbsp;!</p>
        {% include 'layouts/cat-blocs.html.twig' %}
    </section>

    <x-ctaBanner
        icon='<i class="fab fa-twitch"></i>'
        title="Toute la journée"
        text="Différentes associations seront présentées sur le live de Poletech !"
        :url="$link"
        urlText="Twitch.tv/poletechpulv"
        :singleAsso="false"
        :external="true"
    />

    <section class="home-about">
        <div class="home-about__content">
            <div class="home-about__content-number">
                <p>7500</p>
                <p>étudiants</p>
            </div>
            <div class="home-about__content-text">
                <p>Le pôle Léonard de Vinci est composé de 3 écoles (ESILV, EMLV et IIM) et regroupe plus de 7 500 étudiants ! Cependant, comment rencontrer toutes ces personnes ? C’est là qu’intervient le merveilleux principe de la transversalité : semaines transverses, sport obligatoire, et on y vient, le meilleur… les associations !</p>
            </div>
        </div>
        <div class="home-about__content">
            <div class="home-about__content-number">
                <p>59</p>
                <p>associations</p>
            </div>
            <div class="home-about__content-text">
                <p>Les associations, c’est le meilleur moyen pour faire des rencontres et nouer de belles amitiés ! Actuellement, le Pôle compte 59 associations aux domaines variés : sport, gaming, événementiel, business, théâtre, cuisine… Une association te correspond forcément ! Alors n’hésite plus et va prendre du bon temps avec des gens partageant les mêmes centres d’intérêt que toi.
                </p>
            </div>
        </div>
        <div class="home-about__img">
            <img src="{{ asset('build/images/home-wide.png') }}" alt="Image associations">
        </div>
        <div class="home-about__content">
            <div class="home-about__content-number">
                <p>58000</p>
                <p>m&sup2; de locaux</p>
            </div>
            <div class="home-about__content-text">
                <p>Au Pôle, nous avons la chance d’avoir un campus à l’américaine avec près de 58 000m2 de locaux ! De nombreuses salles et équipements sont à ta disposition si tu veux t’amuser ou créer le prochain Go-Go Gadget… De plus, avec l'arrivée en janvier 2022 des nouveaux locaux de l'IIM et l'arrivée prochaine des nouveaux locaux de l'ESILV et l'EMLV, le champ des possibles s'élargi constamment !
                </p>
            </div>

        </div>
        <div class="home-about__content">
            <div class="home-about__content-number">
                <p>350</p>
                <p>évènements</p>
            </div>
            <div class="home-about__content-text">
                <p>Les associations rythment la vie du pôle et des étudiants grâce à leurs évènements ! Qu’ils soient directement à destination des étudiants du pôle ou alors ouverts à l’extérieur, les évènements sont des moments à ne pas louper.
                </p>
            </div>

        </div>
    </section>
</main>
@endsection
