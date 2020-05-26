@extends('layouts.app')

@section('title', 'Priestory a akcie')

@section('content')

@include('inc.messages')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if(count($rooms) > 0)
    <div class="container">
           
        <ul class="row mr-auto ml-auto ">
        
            @foreach($rooms as $room)
           
                <li class="even-odd mb-3 p-1" > 
                    {{--Image--}}
                    <div class="pl-2 pr-2 pt-2 float-left">                                                                       
                        <img src="/storage/{{ $room->image }}" class="w-100 rounded shadow">         
                    </div>
                    {{-- Text --}}
                    <div class="p-3">

                        <div class="row border-bottom border-secondary justify-content-end p-2">
                            @can('update', $room)
                                {{-- <div class="ml-5">
                                    <h3><p>{{ $room->user->username ?? '' }}</p></h3>
                                </div> --}}
                            {{-- Edit Button--}}
                                <a href="/rooms/{{ $room->id }}/edit" >    
                                    <button type="submit"><i class="fa fa-edit edit-icon"></i></button>
                                </a>
                            @endcan

                            @can('delete', $room){{--Delete Button--}}
                                <form action="/rooms/{{ $room->id }} " method="POST">
                                    @method('DELETE')
                                    @csrf
    
                                    <button type="submit" title="Zmazať príspevok"><i class="fa fa-trash delete-icon"></i></button>
                                </form>
                            @endcan
                        </div>

                        {{--Caption--}}
                        <div class="mt-3 pl-2 "><p class="font-weight-bold">{{ $room->caption }}</p></div>   
                        {{--text--}}
                        <div><p style="text-align: justify;">{{ $room->text }}</p></div>   

                    </div>
                </li>
            @endforeach
        </ul>

    </div>
   
@else
    <p>Žiadne príspevky sa nenašli</p>
@endif

@endsection