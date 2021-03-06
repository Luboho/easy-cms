@extends('layouts.app')

@section('title', 'Na prenájom, Stužková, Krstiny, Akcia, Svadba, Jubileum')

@section('content')

@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="container">
    <h2 class="p-2 font-weight-bold text-secondary">Priestory na prenájom</h2>
    @if(count($rooms) > 0)  
    @foreach($rooms as $room)  

        {{-- Dynamic meta og tags for Share buttons --}}
        @section('dynamic_meta')
        <meta property="og:url"           content="{{ url()->current() }}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="{{ $room->caption ?? '' }}" />
        <meta property="og:description"   content="{!! strip_tags($room->text ?? '') !!}" />
        <meta property="og:image"         content="{{ url()->current() }}/storage/{{ $room->image ?? '' }}" />
        @endsection
        {{-- END of Dynamic meta og tags for Share buttons --}}


        <div class="row mr-auto ml-auto mb-3">
            
            <div class="text-background w-100">
                <div class="card-header">
                    <div class="d-flex flex-wrap-reverse pt-2">
                        {{--Caption--}}
                        <h1 class="mr-auto pl-2 pt-1 font-weight-bold" id="title">{{ $room->caption }}</h4>
                        {{-- Buttons --}}
                        <div class="row ml-auto">
                            @can('update', $room)
                                {{-- <div class="ml-5">
                                    <h3><p>{{ $room->user->username ?? '' }}</p></h3>
                                </div> --}}
                            {{-- Edit Button--}}
                                <button style="background:none;">
                                    <a href="/rooms/{{ $room->id }}/edit" >    
                                        <i class="fa fa-edit edit-icon"></i>
                                    </a>
                                </button>
                            @endcan
                            {{--Delete Button--}}
                            @can('delete', $room)
                                <form action="/rooms/{{ $room->id }} " method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button style="background:none;" type="submit" title="Zmazať príspevok"><i id="trash-confirm" class="fa fa-trash delete-icon"></i></button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
                {{-- end buttons --}}
                {{--Image--}}
                @if(!empty($room->image))<div class="pr-2 float-left  text-shadow"><img src="/storage/{{ $room->image }}" id="share-image" class="w-100 share-img"></div>         
                @endif

                {{--text--}}
                <div><p style="text-align: justify;" id="description">{!! $room->text !!}</p></div> 
                <p class="p-1 align-self-end">
                    {{--Create_at--}}
                    {{ $room->created_at->format('d.m. Y') }}                                       
                </p> 

                {{-- FB share/like button --}}
                <div class="fb-share-button" 
                    data-href="" 
                    data-layout="button_count">
                </div>
            {{-- End FB of share/like button --}}
            
            </div>
        </div>
    @endforeach
    @else
        <a href="{{ route('rooms.create') }}">
            <no-posts></no-posts>
        </a>
    @endif
</div>
@endsection