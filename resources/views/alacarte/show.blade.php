@extends('layouts.app')

@section('title', 'Menu, A La Carte, Ponukový lístok, Jedálny lístok')

@section('content')

{{-- Dynamic meta og tags for Share buttons --}}
@section('dynamic_meta')
<meta property="og:url"           content="{{ url()->current() }}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{ $alacarte->caption ?? '' }}" />
<meta property="og:description"   content="{!! strip_tags($alacarte->text ?? '') !!}" />
<meta property="og:image"         content="{{ url('/storage')."/".$alacarte->image ?? '' }}" />
@endsection
{{-- END of Dynamic meta og tags for Share buttons --}}


@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
           
        <div class="mr-auto ml-auto col-10">
        
            <div class="text-background">
                <div class="row align-content-center container p-2">
                {{--Caption--}}
                    {{-- <div class="d-flex ml-1 mt-2 justify-content-between"> --}}
                        <h3 class="pl-2 mt-1 font-weight-bold"  id="title">{{ $alacarte->caption }}</h3>
                        {{-- <h4 class=""> --}}
                            {{--Create_at--}}
                            {{-- {{ $alacarte->created_at->format('d.m. Y') }}                                        --}}
                        {{-- </h4>  --}}
                    {{-- </div>    --}}

                        <div class="row  ml-auto mr-1 p-1">
                            @can('update', $alacarte)
                                {{-- <div class="ml-5">
                                    <h3><p>{{ $alacarte->user->username ?? '' }}</p></h3>
                                </div> --}}
                            {{-- Edit Button--}}
                            <button style="background:none;">
                                <a href="/alacarte/{{ $alacarte->id }}/edit" >    
                                    <i class="fa fa-edit edit-icon"></i>
                                </a>
                            </button>
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
                    @if(!empty($alacarte->image))<div class="p-1"><img src="/storage/{{ $alacarte->image }}" class="w-100 rounded shadow mr-auto ml-auto share-img" title="Jedálny/nápojový lístok"></div>         
                    {{-- FB share/like button --}}
                    <div class="fb-share-button" 
                            data-href="" 
                            data-layout="button_count">
                    </div>
                    {{-- End FB of share/like button --}}
                    @endif
                    
            </div>
        </div>

@endsection