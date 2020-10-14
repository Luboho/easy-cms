@extends('layouts.app')

@section('title', 'Kontakt, Firemné údaje')

@section('content')
    @include('inc.messages')

    @if (Session::has('message'))

        <div class="alert alert-info">{{ Session::get('message') }}</div>

    @endif
    
    <div class="container"> 
            
        <div class="card-header d-flex justify-content-between">
            <h1 class="mt-1">Kontaktné údaje</h1>

            {{-- Edit button --}}
            <div >   
                @if($companyData->isEmpty())
                    @can('isHeadAdmin')
                        <button style="background:none;">
                            <a href="{{ route('company.create') }}" >    
                                <i class="fa fa-edit edit-icon"></i>
                            </a>
                        </button>
                    @endcan
                @else
                {{-- Contact Company Data--}}
                @foreach(Helper::companyData() as $company)
                
                        @can('isHeadAdmin')
                            @if(empty($company))
                                <button style="background:none;">
                                    <a href="{{ route('company.create') }}" >    
                                        <i class="fa fa-edit edit-icon"></i>
                                    </a>
                                </button>
                            @else 
                                <button style="background:none;">
                                    <a href="/company/{{ $company->id }}/edit" >    
                                        <i class="fa fa-edit edit-icon"></i>
                                    </a>
                                </button>
                            @endif

                    @endcan
            </div>
        </div> {{-- end Company data header/ Edit button --}}
    
        @if(Helper::getLogoGlobally()->isEmpty())
            <div class="card-body">
        @else
            @foreach(Helper::getLogoGlobally() as $logo)
                <div class="card-body" style="background-position:center; background-size: inherit; background-image: url('storage/{{ $logo->image }}'); background-repeat: no-repeat;"> 
            @endforeach
        @endif   


                    <div class="row d-flex text-dark p-7 justify-content-between m-auto transparent-bg">   
                        <div class="p-2">
                        
                        <h1 class="p-3 justify-content-center font-weight-bold">Kontakt</h1>
                            <h3 class="ml-2">{{ $company->mobile }}</h3>
                            <h3 class="ml-2">{{ $company->phone }}</h3>
                            <h3 class="ml-2">{{ $company->facebook }}</h3>
                        </div>
                        
                        <div class="p-3">
                            <h1 class="pt-2 pb-2 justify-content-center font-weight-bold">Adresa</h1>
                                <h3 class="ml-2">{{ $company->name }}</h3>
                                <h3 class="ml-2">{{ $company->street }}</h3>
                                <h3 class="ml-2">{{ $company->city }}</h3>
                        </div>

                        <div class="p-3">
                        <h1 class="pt-2 pb-2 justify-content-center font-weight-bold">Otvorené</h1>
                            <h3 class="ml-2">{!! $company->openHours !!}</h3>
                        </div>
                    </div>

                    {{-- FB share/like button --}}
                    <div class="fb-share-button" 
                        data-href="" 
                        data-layout="button_count">
                    </div>
                    {{-- End FB of share/like button --}}
                @endforeach
            @endif
        </div>
    </div>

@endsection