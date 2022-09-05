<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <title>@section('title') Forum Associatif Numérique - Pôle Universitaire Léonard de Vinci @endsection</title>
    @vite(['resources/js/app.js'])
</head>
<body class="@yield('bodyclass')">
    <nav class="navigation">
        <div class="navigation__main-menu">
            <div class="navigation-devinci">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('build/images/logos/logo-devinci-menu.png') }}" alt="Logo Groupe DeVinci">
                </a>
            </div>
            <div class="navigation-forum">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('build/images/logos/logo-forum-menu.png') }}" alt="Logo Forum Associatif Numérique">
                </a>
            </div>
            <div class="navigation-main">
                <div class="navigation-main-burger" id="navigation-burger">
                    <img src="{{ asset('build/images/burger-icon.png') }}" alt="Burger Icon">
                    <span>Menu</span>
                </div>

            </div>
        </div>
        <div class="navigation__main-menu-content">
            <div>
                <a href="/categories/bde-&-clubs-ecoles">
                    <img src="{{ asset('build/images/menu/bde.png') }}" alt="Icone BDE">
                    <span>BDE & Clubs écoles</span>
                </a>
                <a href="/categories/technologies">
                    <img src="{{ asset('build/images/menu/tech.png') }}" alt="Icone Technologies">
                    <span>Technologies</span>
                </a>

            </div>
            <div>
                <a href="/categories/engagement">
                    <img src="{{ asset('build/images/menu/engagement.png') }}" alt="Icone Engagement">
                    <span>Engagement</span>
                </a>
                <a href="/categories/multimedia">
                    <img src="{{ asset('build/images/menu/multimedia.png') }}" alt="Icone Multimedia">
                    <span>Multimédia</span>
                </a>
            </div>
            <div>
                <a href="/categories/business">
                    <img src="{{ asset('build/images/menu/business.png') }}" alt="Icone Business">
                    <span>Business</span>
                </a>
                <a href="/categories/sports">
                    <img src="{{ asset('build/images/menu/sport.png') }}" alt="Icone Sports">
                    <span>Sports</span>
                </a>
            </div>
            <div>
                <a href="/categories/art-&-culture">
                    <img src="{{ asset('build/images/menu/art.png') }}" alt="Icone Art & Culture">
                    <span>Art & Culture</span>
                </a>
                <a href="/associations">
                    <img src="{{ asset('build/images/menu/list.png') }}" alt="Icone Art & Culture">
                    <span>Voir tout</span>
                </a>
            </div>
            <div>
                @auth
                    <a href="/profil">
                        <img src="{{ asset('build/images/menu/profil.png') }}" alt="Icone profile">
                        <span>Profile</span>
                    </a>
                    <a href="/logout">
                        <img src="{{ asset('build/images/menu/logout.png') }}" alt="Icone login">
                        <span>Déconnexion</span>
                    </a>
                @else
                    <a href="/login">
                        <img src="{{ asset('build/images/menu/login.png') }}" alt="Icone login">
                        <span>Connexion</span>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    @yield('content')

    @if(request()->route()->getName() !== 'association.profile')
    <footer>
        <div class="pre-footer">
            <h2>Un forum créé par des étudiants
                pour des étudiants</h2>
            <div class="pre-footer__content">
                <div>
                    <img src="{{ asset('build/images/footer/poletech.png') }}" alt="Logo LDV Esport">
                    <p><a href="/associations/poletech">Poletech</a></p>
                    <p>En charge de la Web TV</p>
                </div>
                <div>
                    <img src="{{ asset('build/images/footer/404.png') }}" alt="Logo La 404 Devinci">
                    <p><a href="/associations/la-404-devinci">La 404 Devinci</a></p>
                    <p>En charge du site web</p>
                </div>
                <div>
                    <img src="{{ asset('build/images/footer/devinci.png') }}" alt="Logo De Vinci">
                    <p>Pôle Léonard De Vinci</p>
                    <p>Soutien de la Vie Associative</p>
                </div>
            </div>
        </div>
        @endif
        <div class="footer">
            <ul>
                <li>© {{ "now"|date("Y") }} La 404 Devinci, tous droits réservés</li>
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
            </ul>
        </div>
    </footer>

    @if(route()->current() == '/')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-PD5VQDG0JS"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-PD5VQDG0JS');
        </script>
    @endif
</body>
</html>
