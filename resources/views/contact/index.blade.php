@extends('layouts.app')

@section('title', 'Kontakt')

@section('content')
    @include('inc.messages')

    @if (Session::has('message'))

        <div class="alert alert-info">{{ Session::get('message') }}</div>

    @endif

    <div class="container">                                                            
        <div class="row">
                
            <div class="col-9 offset-2 m-auto offset-2 card-header align-items-center p-2">
                <span class="ml-3">Kontaktné údaje</span>
            </div>
            <div class="card-body col-9 m-auto offset-2">

                @if($companyData->isEmpty())
                    <div class="d-flex justify-content-end" >   
                        @can('isHeadAdmin')
                            <a href="{{ route('company.create') }}" >    
                                <button type="submit"><i class="fa fa-edit edit-icon"></i></button>
                            </a>
                        @endcan
                    </div>
                @else
                    {{-- Contact Company Data--}}
                    @foreach(Helper::companyData() as $company)
                    
                        <div class="d-flex justify-content-end" >   
                            @can('isHeadAdmin')
                                <a href="{{ route('company.create') }}" >    
                                    <button type="submit"><i class="fa fa-edit edit-icon"></i></button>
                                </a>
                            @endcan
                        </div>
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
                                <div class="ml-2">{{ $company->openHours }}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>        
        </div>

    </div>

@endsection