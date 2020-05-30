@extends('layouts.app')

@section('title', 'Jedálny lístok - upraviť')

@section('content')
    <div class="container">

        <form action="{{ action('AlacarteController@update', $alacarte->id) }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf

            <div class="row">
                
                <div class="col-9 m-auto offset-2 card-header align-items-center p-2">
                    <span class="ml-3">Upraviť príspevok priestorov reštaurácie</span class="ml-3">
                </div>
                
                <div class="card-body col-9 m-auto offset-2">

                    <div class="form-group grid-form-container">
                        <label for="caption" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label>  {{-- CAPTION--}} 

                        <input id="caption" 
                            name="caption"
                            id="grid-form-item2"
                            type="text" 
                            class="form-control @error('caption') is-invalid @enderror" 
                            caption="caption" 
                            value="{{ old('caption') ?? $alacarte->caption }}" 
                            autocomplete="caption" 
                            autofocus>

                        @error('caption')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>  
                    
                    <div class="form-group grid-form-container">
                        {{-- <label for="image" class="col-form-label font-weight-bold" id="grid-form-item1">Obrázok</label> I M A G E- --}}
                        <input type="file" class="form-control-file pb-3 align-self-center" id="grid-form-item2" name="image">

                        <img src="/storage/{{ $alacarte->image }}" id="grid-form-item1" class="w-50 h-auto rounded shadow">
                        @error('image')
                                <strong>{{ $message }}</strong>                       
                        @enderror 
                    </div>


                    <div class="pt-1 text-center">
                        <button class="btn btn-warning">Upraviť príspevok</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection