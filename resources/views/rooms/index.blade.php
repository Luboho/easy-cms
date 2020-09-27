@extends('layouts.app')

@section('title', 'Nástenka')

@section('content')

@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if(count($rooms) > 0)  
@foreach($rooms as $room)  
    <div class="row mr-auto ml-auto col-11 offset-1 mb-3">
    
        <div class="text-background w-100">
            <div class="card-header">
                <div class="d-flex flex-wrap-reverse pt-2">
                    {{--Caption--}}
                    <h5 class="mr-auto pl-2 font-weight-bold">{{ $room->caption }}</h4>
                    {{-- Buttons --}}
                    <div class="row ml-auto">
                        @can('update', $room)
                            {{-- <div class="ml-5">
                                <h3><p>{{ $room->user->username ?? '' }}</p></h3>
                            </div> --}}
                        {{-- Edit Button--}}
                            <a href="/rooms/{{ $room->id }}/edit" >    
                                <button type="submit"><i class="fa fa-edit edit-icon"></i></button>
                            </a>
                        @endcan
                        {{--Delete Button--}}
                        @can('delete', $room)
                            <form action="/rooms/{{ $room->id }} " method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" title="Zmazať príspevok"><i id="trash-confirm" class="fa fa-trash delete-icon"></i></button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
            {{-- end buttons --}}
            {{--Image--}}
            @if(!empty($room->image))<div class="pr-2 float-left "><img src="/storage/{{ $room->image }}" class="w-100 shadow"></div>         
            @endif
            {{-- Text --}}
                

                
            {{--text--}}
            <div><p style="text-align: justify;">{!! $room->text !!}</p></div> 
            <p class="p-1 align-self-end">
                {{--Create_at--}}
                {{ $room->created_at->format('d.m. Y') }}                                       
            </p> 
        </div>
    </div>
@endforeach
@else
            <no-posts></no-posts>
@endif

@endsection