<nav class="navbar navbar-expand-md navbar-light shadow-md" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <div>   
                @if(Helper::getLogoGlobally()->isEmpty())
                    <img src="{{ url('storage/default-pics/defaultLogo.jpg') }}" style="max-height:50px" class="align-content-center rounded-circle">
                @else
                    @foreach(Helper::getLogoGlobally() as $logo)
                        <img src="/storage/{{ $logo->image }}" style="max-height:50px" class="align-content-center rounded-circle">
                    @endforeach
                @endif
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Domov</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('alacarte.index')}}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rooms.index') }}">Priestory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <img src="{{ asset('storage/default-pics/login.png') }}" class="ml-3 rounded-circle" style="max-width: 30px; height:auto;">
                        </a>
                    </li>
                    
                @else
                    <li class="nav-item dropdown">
                       
                        <!-- New Post | DropDown-->
                        <li class="nav-item ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Nový príspevok
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('posts.create') }}" class="dropdown-item">Nástenka</a>
                                    <a href="{{ route('alacarte.create') }}" class="dropdown-item">Menu</a>
                                    <a href="{{ route('rooms.create') }}" class="dropdown-item">Priestory</a>
                                </div>
                            </div>
                        </li>
                        <!-- End New Post-->
                        
                        {{-- Users DropDown--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Domov</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('alacarte.index') }}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rooms.index') }}">Priestory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.index') }}">Kontakt</a>
                        </li>

                        <!-- Users | New User -->
                        @can('isAdmin')
                            <li class="nav-item ">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Užívatelia
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('profiles.index') }}">Užívatelia</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">Nový Užívateľ</a>
                                    </div>
                                </div>
                            </li>
                        @endcan

                        <li class="nav-item">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <strong>{{ Auth::user()->username }}</strong> 
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Odhlásiť
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                             </li>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>