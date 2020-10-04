@extends('layouts.app')

@section('title', 'Nápojový lístok - list')

@section('content')

@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
           
        <div class="mr-auto ml-auto col-10">
        
            <div class="text-background">
                <div class="row align-content-center container p-2">
                {{--Caption--}}
                    <div class="d-flex mr-auto ml-1 mt-2 justify-content-between">
                        <h4 class="font-weight-bold">{{ $alacarte->caption }}</h4>
                        <h4 class="">
                            {{--Create_at--}}
                            {{-- {{ $alacarte->created_at->format('d.m. Y') }}                                        --}}
                        </h4> 
                    </div>   

                        <div class="row align-content-center ml-auto mr-1 p-1">
                            @can('update', $alacarte)
                                {{-- <div class="ml-5">
                                    <h3><p>{{ $alacarte->user->username ?? '' }}</p></h3>
                                </div> --}}
                            {{-- Edit Button--}}
                                <a href="/alacarte/{{ $alacarte->id }}/edit" >    
                                    <i class="fa fa-edit edit-icon"></i>
                                </a>
                            @endcan

                            @can('delete', $alacarte){{--Delete Button--}}
                                <form action="/alacarte/{{ $alacarte->id }} " method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button style="background:none;" type="submit" title="Zmazať príspevok"><i id="trash-confirm" class="fa fa-trash delete-icon"></i></button>
                                </form>
                            @endcan
                        </div>
                </div>
                    {{--Image--}}
                    @if(!empty($alacarte->image))<div class="p-1"><img src="/storage/{{ $alacarte->image }}" class="w-100 rounded shadow mr-auto ml-auto"></div>         
                    @endif
                    
            </div>
        </div>

@endsection