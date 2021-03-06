@extends('layouts.app')

@section('title', 'Denná ponuka, Denné menu, Aktuálna ponuka')

{{-- Dynamic meta og tags for Share buttons --}}
@section('dynamic_meta')
<meta property="og:url"           content="{{ url()->current() }}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{ $post->caption ?? '' }}" />
<meta property="og:description"   content="{!! strip_tags($post->text ?? '') !!}" />
<meta property="og:image"         content="{{ url('/storage')."/".$post->image ?? '' }}" />
@endsection
{{-- END of Dynamic meta og tags for Share buttons --}}

@section('content')

@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    
        <div class="row mr-auto ml-auto  p-1">

            <div class="text-background w-100">
                <div class="card-header">

                    <div class="d-flex flex-wrap-reverse">
                        {{--Caption--}}
                        <h1 id="title" class="mr-auto pl-2 mt-1 font-weight-bold">{{ $post->caption }}</h1>
                        {{-- Buttons --}}
                        <div class="row ml-auto">
                            @can('update', $post)
                                {{-- <div class="ml-5">
                                    <h3><p>{{ $post->user->username ?? '' }}</p></h3>
                                </div> --}}
                            {{-- Edit Button--}}
                                <button style="background:none;">
                                    <a href="/posts/{{ $post->id }}/edit" >
                                        <i class="fa fa-edit edit-icon"></i>
                                    </a>
                                </button>
                            @endcan
                            {{--Delete Button--}}
                            @can('delete', $post)
                                <form action="/posts/{{ $post->id }} " method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button style="background:none;" type="submit"  title="Zmazať príspevok"><i id="trash-confirm" class="fa fa-trash delete-icon"></i></button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
                {{-- end buttons --}}
                {{--Image--}}
                @if(!empty($post->image))<div class="pr-2 float-left"><img src="/storage/{{ $post->image }}" class="w-100 shadow share-img" title="Ponuka"></div>
                @endif
                {{-- Text --}}
                
                    {{--text--}}
                    <div><p style="text-align: justify;" id="description">{!! $post->text !!}</p></div>
                    <p class="p-1 align-self-end">
                        {{--Create_at--}}
                        {{ $post->created_at->format('d.m. Y') }}
                    </p>
                    {{-- FB share/like button --}}
                    <div class="fb-share-button" 
                        data-href="" 
                        data-layout="button_count">
                    </div>
                    {{-- End FB of share/like button --}}    
            </div>

        </div>

@endsection