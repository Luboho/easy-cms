@extends('layouts.app')

@section('title', 'Nástenka')

@section('content')

@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
           
        <div class="row mr-auto ml-auto ">
        
            <div class="text-background mb-3 w-100 p-1">
                {{--Image--}}
                @if(!empty($post->image))<div class="pr-2 float-left "><img src="/storage/{{ $post->image }}" class="w-100 rounded shadow"></div>         
                @endif
                {{-- Text --}}
                <div class="p-3">

                    <div class="row justify-content-end p-2">
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
                    @if(!empty($post->attention_message))<h2 class="text-warning bg-dark rounded text-center p-3">{{ $post->attention_message}}</h2>@endif
                    {{--Caption--}}
                    <div class="mt-3 pt-2 pl-2 "><p class="font-weight-bold">{{ $post->caption }}</p></div>   
                    {{--text--}}
                    <div><p style="text-align: justify;">{!! $post->text !!}</p></div> 
                    <p class="p-1 align-self-end">
                        {{--Create_at--}}
                        {{ $post->created_at->format('d.m. Y') }}                                       
                    </p>  
                </div>
            </div>
            
        </div>

@endsection