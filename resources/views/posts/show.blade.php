@extends('layouts.app')

@section('title', 'Nástenka')

@section('content')

@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
           
        <div class="row mr-auto ml-auto ">
        
            <div class="text-background mb-3 p-1 mr-auto ml-auto"> 
                {{--Image--}}
                @if(!empty($post->image))
                    <div class="each-image-show pr-2 float-left">                                                                       
                        <img src="/storage/{{ $post->image }}" class="w-100 rounded">         
                    </div>
                @endif
                {{-- Buttons --}}
                <div class="">
                    
                    <div class="row p-2 align-middle border-bottom border-secondary justify-content-end">
                        @can('update', $post)
                        
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

                    {{--Caption--}}
                    <div class="p-1"><p class="font-weight-bold">{{ $post->caption }}</p></div>   
                    {{--text--}}
                    <div class="p-3"><p style="text-align: justify;">{{ $post->text }}</p></div>   
                    @if(!empty($post->attention_message))<h2 class="text-warning bg-dark rounded text-center p-3">{{ $post->attention_message}}</h2>@endif


                </div>
            </div>
            
        </div>

@endsection