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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/favicon/favicon.ico') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/676fd051d4.css">

</head>
<body onload="ckeditor()">
    <div id="app">
        
        <div id="up">
            @include('inc.navbar')
        </div>

        <main class="py-4">
            @yield('content')
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

        <up-down></up-down>                                             {{--UP & DOWN Arrows--}}


        @include('inc.scripts')

        <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
        <script>
            function ckeditor() {
                CKEDITOR.replace( 'summary-ckeditor' );
                CKEDITOR.replace( 'summary-ckeditor2' );
            }
        </script>
        
    </div>
</body>
</html>
