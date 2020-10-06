@extends('layouts.app')
@section('title', 'Úprava príspevkov')


@section('content')

    <div class="container">
        
        <form action="/posts/{{ $post->id }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf

            <div class="row">

                <div class="col-12 m-auto card-header align-items-center p-2">
                    <span class="ml-3">Upraviť príspevok</span>
                </div>

                <div class="col-12 card-body m-auto">

                    <div class="form-group grid-form-container">
                        <label for="caption" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label> {{-- TITLE--}}
                    
                        <input type="text"
                            id="grid-form-item2"
                            name="caption"
                            value="{{ old('caption') ?? $post->caption }}"
                            class="form-control @error('caption') is-invalid @enderror"
                            autocomplete="caption">

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </div>

                    <div class="form-group grid-form-container">
                        
                        {{-- <label for="image" class="col-form-label font-weight-bold" id="grid-form-item1">Obrázok</label> IMAGE --}}
                        <input type="file" class="form-control-file pb-3 align-self-center" id="grid-form-item2" name="image">
                        
                        <img src="/storage/{{ $post->image }}" id="grid-form-item1" class="w-50 rounded h-auto shadow">
                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group grid-form-container">
                        <label for="text" class="col-form-label font-weight-bold" id="grid-form-item1">Text</label>

                    <textarea rows="3" cols="50"
                        id="editor"
                        name="text"                                                                     {{-- TEXT --}}
                        type="text" 
                        class="form-control @error('text') is-invalid @enderror" 
                        caption="text" 
                        value="" 
                        autocomplete="text">{{ old('text') ?? $post->text }}
                    </textarea>

                        @error('text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="text-center pt-3">
                        <button type="submit" class="btn btn-warning">Upraviť</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection