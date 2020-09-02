@extends('layouts.app')

@section('title', 'Priestory úprava')

@section('content')
    <div class="container">

        <form action="/rooms/{{ $room->id }}" enctype="multipart/form-data" method="post">
            @method('PATCH')
            @csrf

            <div class="row">

                <div class="col-12 m-auto card-header align-items-center p-2">
                    <span class="ml-3">Upraviť príspevok</span>
                </div>
        
                <div class="card-body col-12 m-auto offset-2">

                    <div class="form-group grid-form-container">
                        <label for="caption" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label>   {{-- Title --}}

                        <input id="grid-form-item2" 
                                name="caption"
                                type="text" 
                                class="form-control @error('caption') is-invalid @enderror" 
                                caption="caption" 
                                value="{{ old('caption') ?? $room->caption }}" 
                                autocomplete="caption" 
                                autofocus>

                        @error('caption')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
            
                    </div>  
                    
                    <div class="form-group grid-form-container">
                        {{-- <label for="image" class="col-form-label font-weight-bold">Obrázok</label> Image --}}
                        <input type="file" class="form-control-file pb-3 align-self-center" id="grid-form-item2" name="image">

                        <img src="/storage/{{ $room->image }}" id="grid-form-item1" class="w-50 h-auto rounded shadow">
                        @error('image')
                                <strong>{{ $message }}</strong>                       
                        @enderror 
                    </div>

                    <div class="form-group grid-form-container">
                        <label for="text" class="col-form-label font-weight-bold" id="grid-form-item1">Text</label>     {{-- TEXT --}}

                        <textarea rows="3" cols="50"
                            id="summary-ckeditor"
                            name="text"                                                                     {{-- TEXT --}}
                            type="text" 
                            class="form-control @error('text') is-invalid @enderror" 
                            caption="text" 
                            value="" 
                            autocomplete="text">{{ old('text') ?? $room->text }}
                        </textarea>

                        @error('text')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
            
                    </div>

                    <div class="pt-1 text-center">
                        <button type="submit" class="btn btn-warning">Upraviť</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection