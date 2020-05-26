@extends('layouts.app')

@section('title', 'Jedálny lístok')

@section('content')

@if(count($alacartes) > 0)
    <div class="container">
       
        <ul class="col-12">

            @foreach($alacartes as $alacarte)

                <li class="even-odd m-3 p-3 shadow" style="border-radius: 10px">

                    <div class="d-flex justify-content-between mr-3">
                        <h2 class="mt-3 font-weight-bold">{{ $alacarte->caption }}</h2>       {{--Caption--}}

                        <div class="row d-flex align-self-center justify-content-end">
                            @can('update', $alacarte)
                                {{-- <div class="ml-5">                                    
                                    <h3><p>{{ $alacarte->user->username }}</p></h3>
                                </div> --}}

                                <a href="/alacarte/{{ $alacarte->id }}/edit" >     {{-- Edit Button--}}
                                    <button type="submit"><i class="fa fa-edit edit-icon"></i></button>
                                </a>
                            @endcan

                            @can('delete', $alacarte)                                            
                            <form action="/alacarte/{{ $alacarte->id }} " method="POST">
                                @method('DELETE')
                                @csrf
                                                                                                    {{--Delete Button--}}
                                <button type="submit" title="Zmazať príspevok"><i class="fa fa-trash delete-icon"></i></button>
                            </form>
                            @endcan
                        </div>

                    </div>

                        <img src="/storage/{{ $alacarte->image }}" class="w-100 rounded shadow">    {{-- Image--}}

                </li>

            @endforeach

        </ul>

    </div>
@else
    <p>Žiadne príspevky sa nenašli</p>
@endif

@endsection

