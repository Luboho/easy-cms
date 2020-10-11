@extends('layouts.app')

@section('title', 'Jedálny lístok')

@section('content')

@if(count($alacartes) > 0)
    <div class="container">
    
        @include('inc.messages')

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <ul class="col-12">

            <h4 class="p-2 font-weight-bold text-secondary">Menu lístok</h4>
            <article class="row d-flex justify-content-between align-items-end">    
                @foreach($alacartes as $alacarte)
                    <div class="gallery-item mb-4 p-1 even-odd text-background shadow" id="gallery">
                        <div class="shadow">
                            <a href="/alacarte/{{ $alacarte->id }}" class="text-dark text-decoration-none">

                                <div class="p-1 justify-content-between align-content-between rounded-bottom">
                                    
                                    {{--Caption--}}
                                    <div class="p-2">{{ $alacarte->caption }}</div>
                                    {{--Created_at--}}                                     
                                    {{-- <div class="ml-2 p-2 align-items-end">
                                        {{ $alacarte->created_at->format('d.m. Y') }}                                       
                                    </div> --}}
                                </div>
                                @if(!empty($alacarte->image))<img src="/storage/{{ $alacarte->image }}" class="rounded w-100">@endif 
                            
                            </a>

                        </div>
                    </div>
                @endforeach
            </article>

        </ul>
        <div class="row col-12">
            <span class="row ml-auto mr-auto">{{ $alacartes->links() }}</span>
        </div>
    </div>
@else
<a href="{{ route('alacarte.create') }}">
    <no-posts></no-posts>
</a>
@endif

@endsection

