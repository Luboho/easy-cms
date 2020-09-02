@extends('layouts.app')

@section('title', 'Nástenka príspevkov - galéria')

@section('content')

@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

        <div class="container posts-container col-12">
            <header>  
                <div class="">
                    
                    <div class="card-header text-right">
                        {{-- LOGO--}}
                        @if(Helper::getLogoGlobally()->isEmpty())                                                  
                            
                            @can('isHeadAdmin')
                                <a href="{{ route('logos.create') }}">                         {{--Create Button--}}    
                                    <button type="submit"><i class="edit-icon fa fa-edit"></i></button>
                                </a>
                            @endcan
                            <img src="{{ url('storage/default-pics/defaultLogo.jpg') }}">
                        @else 
                        {{-- Logo & Captions --}}
                        @foreach(Helper::getLogoGlobally() as $logo)                                         
                            {{--Edit Button--}}
                            @can('isHeadAdmin')
                                <a href="/logos/{{ $logo->id }}/edit">    
                                    <button type="submit">
                                        <i class="edit-icon fa fa-edit"></i>
                                    </button> 
                                </a>
                            @endcan
                    </div>
                    {{-- end Buttons --}}
                        <div class="post-title text-background">
                            
                            <div class="d-flex justify-content-center row col-12">
                                <div class="pl-4 pr-2">
                                    <h2 class=" font-weight-bold text-break">{{ $logo->caption1 }}</h2>
                                    <h3 class="">{{ $logo->caption2 }}</h3>
                                    <h3 class=" font-italic">{!! $logo->caption3 !!}</h3>
                                </div>
                                <img src="/storage/{{ $logo->image }}" style="max-height: 150px;" class="pl-2 pr-2 pb-2 -circle">
                            </div>
                    @endforeach
                                
                    @endif
                                
                        </div>
                </div>
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
                            @if($loop->iteration > 3)
                                @break 
                            @endif
                            <div class="text-background mb-3 w-100">
                                <div class="card-header d-flex justify-content-between">
                                    {{--Caption--}}
                                    <h4 class="font-weight-bold">{{ $post->caption }}</h4>
                                    <div class="row">
                                        @can('update', $post)
                                            {{-- <div class="ml-5">
                                                <h3><p>{{ $post->user->username ?? '' }}</p></h3>
                                            </div> --}}
                                        {{-- Edit Button--}}
                                            <a href="/posts/{{ $post->id }}/edit" >    
                                                <button type="submit"><i class="fa fa-edit edit-icon"></i></button>
                                            </a>
                                        @endcan
            
                                        @can('delete', $post){{--Delete Button--}}
                                            <form action="/posts/{{ $post->id }} " method="POST">
                                                @method('DELETE')
                                                @csrf
                
                                                <button type="submit" title="Zmazať príspevok"><i class="fa fa-trash delete-icon"></i></button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                {{--Image--}}
                                @if(!empty($post->image))<div class="pr-2 float-left "><img src="/storage/{{ $post->image }}" class="w-100  shadow"></div>         
                                @endif
                                {{-- Text --}}
                                <div class="">
            
                                    
                                    @if(!empty($post->attention_message)){{--<h2 class="text-warning bg-dark  text-center p-3">--}}<div class="attention">{!! $post->attention_message !!}</div>{{--</h2>--}}@endif
                                      
                                    {{--text--}}
                                    <div><p style="text-align: justify;">{!! $post->text !!}</p></div> 
                                    <p class="p-1 align-self-end">
                                        {{--Create_at--}}
                                        {{ $post->created_at->format('d.m. Y') }}                                       
                                    </p>  
                                </div>
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

                                    @if(!empty($post->attention_message)){{--<h2 class="text-warning bg-dark  text-center p-3">--}}<div class="attention">{!! $post->attention_message !!}</div>{{--</h2>--}}@endif

                                    @if(!empty($post->image))<img src="/storage/{{ $post->image }}" class=" w-100">@endif 
                                
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

                                <div class="shadow">
                                    <a href="/posts/{{ $post->id }}" class="text-dark text-decoration-none">

                                        @if(!empty($post->attention_message)){{--<h2 class="text-warning bg-dark  text-center p-3">--}}<div class="attention">{!! $post->attention_message !!}</div>{{--</h2>--}}@endif

                                        @if(!empty($post->image))<img src="/storage/{{ $post->image }}" class=" w-100">@endif 
                                    
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
        <p> Príspevky nenájdené.</p>
    @endif

@endsection

