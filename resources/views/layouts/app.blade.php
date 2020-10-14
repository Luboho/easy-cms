<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> {{-- !!! Defer atribute to use Vue. --}}
    <script src="https://use.fontawesome.com/eda50d2248.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/favicon/favicon.ico') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/676fd051d4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css">
    {{-- FB share button with counter --}}
    @yield('dynamic_meta')
    
</head>

<body>
    <div id="app">
        <div id="up">
            @include('inc.navbar')
        </div>

        <div>
            @include('inc.social-media')
        </div>

        <main class="py-4">
            @yield('content')
            <div id="fb-root"></div>

            {{--UP & DOWN Arrow buttons--}}
            <up-down></up-down>  

        </main>
        
        <footer id="down" class="bg-secondary">
            <div class="container p-3">
                <div class="p-3" id="footer-section1">             
                    <p><a href="{{ route('posts.show') }}" class="text-warning">Domov</a></p>
                    <p><a href="{{ route('posts.show') }}#gallery" class="text-warning">Galéria</a></p>
                    <p><a href="{{ route('alacarte.index') }}" class="text-warning">Menu lístok</a></p>
                    <p><a href="{{ route('rooms.index') }}" class="text-warning">Priestory</a></p>
                </div>

                @if(!empty(Helper::companyData()))
                    <div class="rounded p-1" id="footer-section2" style="color:silver">  
                        @foreach(Helper::companyData() as $company)
        
                            <div class="ml-3">
                                <h5 class="pt-3 font-weight-bold">Kontakt</h5>
                                <p class="ml-2">{{ $company->mobile }}</p>
                                <p class="ml-2">{{ $company->phone }}</p>
                                <p class="ml-2">{{ $company->facebook }}</p>
                            </div>

                            <div class="ml-3">
                                <h5 class="pt-3 font-weight-bold">Otvorené</h5>
                                <p class="ml-2">{!! $company->openHours !!}</p>
                            </div>
        
                            <div class="ml-3 border-secondary">
                                <h5 class="pt-3 font-weight-bold">Adresa</h5>
                                <p class="ml-2">{{ $company->name }}</p>
                                <p class="ml-2">{{ $company->street }}</p>
                                <p class="ml-2">{{ $company->city }}</p>
                            </div>
                                
                        @endforeach
                    </div>
                @endif
                    
                <div class="contact-create pt-3" id="footer-section3">                                       {{-- Contact Form --}}
                    @include('contact.create')
                </div>

                <div class="row p-3 rounded" id="footer-section4" style="color:silver">          
                    <p class="p-3 align-bottom text-center"> © 2020. WebCms všetky práva vyhradené. Luboho web design. </p>
                </div>
            </div>
        </footer>

        @include('inc.scripts')
 
 
</div> <!-- END OF ID APP -->
</body>
</html>

        