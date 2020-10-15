<nav class="navbar navbar-expand-md navbar-light shadow-md" id="navbar">
    <div class="container">
        
        {{--NAVBAR LOGO--}}
        <ul class="navbar-nav ml-0">
            <a class="navbar-brand" href="{{ url('/') }}">
                <li class="text-center nav-item">
                    @if(Helper::getLogoGlobally()->isEmpty())
                        <img src="{{ url('storage/default-pics/defaultLogo.jpg') }}" style="max-height:50px" class="align-content-center rounded-circle">
                    @else
                        @foreach(Helper::getLogoGlobally() as $logo)
                            <img src="/storage/{{ $logo->image }}" style="max-height:50px" class="align-content-center rounded-circle">
                        @endforeach
                    @endif
                </li>
                <li class="nav-item">
                {{-- Company Name --}}
                    @foreach(Helper::CompanyData() as $companyName)
                        <h1 style="font-size: 1em;" class="font-weight-bold text-dark">{{ $companyName->name }}</h1>
                    @endforeach
                </li>
            </a>
        </ul>
        {{-- End Navbar Logo --}}

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto d-flex flex-wrap">
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
                        <a class="nav-link" href="{{ route('company.index') }}">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <img src="{{ asset('storage/default-pics/login.png') }}" class="ml-3 rounded-circle" style="max-width: 30px; height:auto;">
                        </a>
                    </li>
                    
                @else
                    <li class="nav-item dropdown">
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
                            <a class="nav-link" href="{{ route('company.index') }}">Kontakt</a>
                        </li>

                        <!-- New Post | DropDown-->
                        <li class="nav-item">
                            <div class="btn-group dropdown">
                                <button type="button" class="btn dropdown-toggle font-weight-bold pt-2" id="new-post" data-toggle="dropdown" >
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

                        <!-- Users | New User -->
                        @can('isAdmin')
                            <li class="nav-item">
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle font-weight-bold pt-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Užívatelia
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('profiles.index') }}">Užívatelia</a>
                                        <a class="dropdown-item" href="{{ route('invitation.create') }}">Nový Užívateľ</a>
                                    </div>
                                </div>
                            </li>
                        @endcan

                        <li class="nav-item">
                            <div class="btn-group">
                            <button id="navbarDropdown" class=" btn dropdown-toggle pt-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <strong>{{ Auth::user()->username }}</strong> 
                                <span class="caret"></span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item " href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Odhlásiť
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            </div>
                        </li>
                    </li>
                @endguest
            </ul>
        
        </div>
    </div>
</nav>