@extends('layouts.app')



@section('title', 'Galéria pokrmov, Denná ponuka jedál, Aktuálna ponuka')

@section('content')

@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
        <div class="container">
            <header class="border-bottom pb-4">  
                    {{-- Logo & Captions --}}
                    @foreach(Helper::getLogoGlobally() as $logo)                                         
                    {{--Edit Button--}}
                    @can('isHeadAdmin')
                        <div class="card-header text-right">
                            <button type="submit" style="background:none;"><a href="/logos/{{ $logo->id }}/edit">    
                                <i class="edit-icon fa fa-edit"></i></a>
                            </button>
                        </div>
                    @endcan
                        {{-- end Buttons --}}
                        <div class="card-body welcome-container justify-content-center post-title col-12">
                            
                                <div class="pl-4 pr-2">
                                    <h1 class="font-weight-bold text-break" id="caption">{!! $logo->text !!}</h1>
                                    
                                </div>
                                <div class="text-center">
                                    @if($logo->image !== null)<img src="/storage/{{ $logo->image }}" style="max-height: 150px; max-width:180px;" class="rounded-circle" title="">
                                    @endif
                                </div>

                        </div>
                    @endforeach
            </header>
                {{-- LOOP 1.2.3.iterations | 1.paggination--}}
            <div>

    @if(count($posts) > 0)                                  
                @php                                       
                    $currentUrl = url()->full(); 
                @endphp

                @if(preg_match('/page=[^1]/', $currentUrl))
                @else                                                                   
                                                
                        <h2 class="pt-3 pb-1 text-center text-secondary">Aktuálne</h2>
                        <div class="row mr-auto ml-auto">
                        @foreach ($posts as $post)
                        {{-- Dynamic meta og tags for Share buttons --}}
                        @section('dynamic_meta')
                            <meta property="og:url"           content="{{ url()->current() }}" />
                            <meta property="og:type"          content="website" />
                            <meta property="og:title"         content="{{ $post->caption ?? '' }}" />
                            <meta property="og:description"   content="{!! strip_tags($post->text ?? '') !!}" />
                            <meta property="og:image"         content="{{ url()->current() }}/storage/{{ $post->image ?? '' }}" />
                        @endsection
                        {{-- END of Dynamic meta og tags for Share buttons --}}
                        
                            @if($loop->iteration > 3)
                                @break 
                            @endif
                            <div class="text-background mb-3 w-100">
                                <div class="card-header d-flex justify-content-between">
                                    {{--Caption--}}
                                    <h1 id="title" class="pl-2 mt-1 font-weight-bold">{{ $post->caption }}</h1>
                                    <div class="row">
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
                
                                                <button style="background:none;" id="delete-btn" type="submit"><i id="trash-confirm" class="fa fa-trash delete-icon"></i></button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                {{--Image--}}
                                @if(!empty($post->image))<div class="pr-2 float-left "><img src="/storage/{{ $post->image }}" id="share-image" class="w-100 share-img shadow" title="Ponuka"></div>         
                                @endif
                                
                                {{-- Text --}}
                                <div class="ml-2">
            
                                    {{--text--}}
                                    <div><p style="text-align: justify;" id="description">{!! $post->text !!}</p></div> 
                                    <p class="align-self-end">
                                        {{--Create_at--}}
                                        {{ $post->created_at->format('d.m. Y') }}                                       
                                    </p> 
                                    
                                </div>
                                {{-- FB share/like button --}}
                                <div class="fb-share-button" 
                                    data-href="#" 
                                    data-layout="button_count">
                                </div>
                                {{-- End FB of share/like button --}}
                            </div>
                       @endforeach
                        </div>
                @endif
            </div>
            <hr>
            <h2 class="text-center text-secondary mt-4 mb-1">Galéria</h2>

            <article class="row d-flex justify-content-between">    
               
                {{-- 2. Pagination | Gallery--}}
                @if(preg_match('/page=[^1]/', $currentUrl))                                                 
                    @foreach($posts as $post)
    
                        <div class="gallery-item align-items-stretch justify-content-between p-2" id="gallery">
                            <div class="shadow">
                                <a href="/posts/{{ $post->id }}" class="text-dark text-decoration-none">

                                    @if(!empty($post->image))<img src="/storage/{{ $post->image }}" class="share-img w-100" title="Ponuka">@endif 
                                
                                    <div class="posts-bg p-1 d-flex justify-content-between -bottom">
                                        
                                        {{--Caption--}}
                                        <div class="p-2 align-items-end">{{ $post->caption }}</div>
                                         {{--Create_at--}}                                     
                                        <div class="ml-2 p-2 align-items-end">
                                            {{ $post->created_at->format('d.m. Y') }}                                       
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    @endforeach

                @else 
                
                {{-- Home Page & First Pagination--}} 
                 {{-- gallery | LOOP start form 4.iteration--}}                                                                                        
                    @foreach($posts as $post)                                                                               
                        @if ($loop->index > 2)                                                                 

                            <div class="gallery-item align-items-stretch justify-content-between p-2" id="gallery">

                                <div class="text-background">
                                    <a href="/posts/{{ $post->id }}" class="text-dark text-decoration-none">

                                        @if(!empty($post->image))<img src="/storage/{{ $post->image }}" class="share-img w-100" title="Ponuka">@endif 
                                    
                                        <div class="posts-bg p-1 d-flex justify-content-between -bottom">
                                            
                                            {{--Caption--}}
                                            <div class="p-2 align-items-end">{{ $post->caption }}</div>
                                             {{--Create_at--}}                                     
                                            <div class="ml-2 p-2 align-items-end">
                                                {{ $post->created_at->format('d.m. Y') }}                                       
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>

                        @endif     
                    @endforeach
                @endif

            </article>

            <div class="row col-12">
                <span class="row ml-auto mr-auto">{{ $posts->links() }}</span>
            </div>

        </div>

    @else
        <a href="{{ route('posts.create') }}">
            <no-posts></no-posts>
        </a>
    @endif


@endsection

