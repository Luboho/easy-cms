@extends('layouts.app')

@section('title', 'Kontakt')

@section('content')
    @include('inc.messages')

    @if (Session::has('message'))

        <div class="alert alert-info">{{ Session::get('message') }}</div>

    @endif

    <div class="container">                                                            
        <div class="shadow">        
            <div class="card-header d-flex justify-content-between mt-3">
                <h3>Kontaktné údaje</h3>

                {{-- Edit button --}}
                <div class="mt-1" >   
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
                                        <a href="contact/company/{{ $company->id }}/edit" >    
                                            <i class="fa fa-edit edit-icon"></i>
                                        </a>
                                    </button>
                                @endif

                        @endcan
                </div>
            </div> {{-- end Company data header/ Edit button --}}
        
            <div class="card-body">

                        <div class="row d-flex p-1 justify-content-between m-auto">   
                            <div class="p-3">
                            
                            <h4 class="pt-2 pb-2 justify-content-center font-weight-bold">Kontakt</h4>
                                <div class="ml-2">{{ $company->mobile }}</div>
                                <div class="ml-2">{{ $company->phone }}</div>
                                <div class="ml-2">{{ $company->facebook }}</div>
                            </div>
                            
                            <div class="p-3">
                                <h4 class="pt-2 pb-2 justify-content-center font-weight-bold">Adresa</h4>
                                    <div class="ml-2">{{ $company->name }}</div>
                                    <div class="ml-2">{{ $company->street }}</div>
                                    <div class="ml-2">{{ $company->city }}</div>
                            </div>

                            <div class="p-3">
                            <h4 class="pt-2 pb-2 justify-content-center font-weight-bold">Otvorené</h4>
                                <div class="ml-2">{!! $company->openHours !!}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>        
    </div>

@endsection