@extends('layouts.app')

@section('title', 'Nástenka - nový príspevok')

@section('content')
<div class="container">

    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post">  
        @csrf
        <div class="row">

            <div class="col-9 m-auto offset-2 card-header align-items-center p-2">
                <span class="ml-3">Nový príspevok na nástenku</span>
            </div>

            <div class="card-body col-9 m-auto offset-2">
          
                <div class="form-group grid-form-container">
                    <label for="caption" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label>
                                                                                                        {{-- Caption--}}
                    <input id="grid-form-item2" 
                            name="caption"
                            type="text" 
                            class="form-control  @error('caption') is-invalid @enderror" 
                            caption="caption" 
                            value="{{ old('caption') }}" 
                            autocomplete="caption"
                            autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        
                </div>  
                
                <div class="grid-form-container pt-3 form-group">
                    <label for="image" class="col-form-label font-weight-bold" id="grid-form-item1">Obrázok</label>     {{--- Image --}}
                    <input type="file" class="form-control-file pb-3" id="grid-form-item2" name="image">

                    @error('image')
                            <strong>{{ $message }}</strong>                       
                    @enderror 
                </div>

                <div class="grid-form-container form-group ">
                    <label for="text" class="col-form-label font-weight-bold" id="grid-form-item1">Text</label>
    
                    <textarea rows="3" cols="50"
                        id="grid-form-item2"
                        name="text"                                                                     {{-- TEXT --}}
                        type="text" 
                        class="form-control @error('text') is-invalid @enderror" 
                        caption="text" 
                        value="" 
                        autocomplete="text">
                        {{ old('text') }}
                    </textarea>

                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="pt-1 text-center">
                    <button class="btn btn-warning">Pridať príspevok</button>
                </div>

            </div>
        </div>
    </form>

    {{-- Attention Message Form--}}
    <form action="{{ route('posts.store') }}" class="pt-5" method="post">
        @csrf
        
        <div class="row">

            <div class="col-9 offset-2 m-auto offset-2 card-header align-items-center p-2">
                <span class="ml-3">Upozornenie na nástenku</span>
            </div>
        
                <div class="card-body col-9 m-auto offset-2 bg-danger">

                    <div class="form-group grid-form-container">
                        <label for="attention_message" class="col-form-label text-white font-weight-bold" id="grid-form-item1">Upozornenie</label>
                                                                                                            {{-- Attention Message--}}
                        <input id="grid-form-item2" 
                                name="attention_message"
                                type="text" 
                                class="form-control @error('attention_message') is-invalid @enderror" 
                                caption="attention_message" 
                                value="{{ old('attention_message') }}" 
                                autocomplete="attention_message" 
                                >
                    
                        @error('attention_message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                        <div class="text-center pt-3">
                            <button type="submit" class="btn btn-warning">Pridať príspevok</button>
                        </div>
                        
                </div>
        </div>

    </form>

</div>
@endsection