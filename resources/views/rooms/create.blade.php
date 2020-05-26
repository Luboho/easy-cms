@extends('layouts.app')

@section('title', 'Priestory - nový príspevok')

    @section('content')

        <form action="/rooms" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">

                <div class="col-9 offset-2 m-auto offset-2 card-header align-items-center p-2">
                    <span class="ml-3">Príspevok do priestorov reštaurácie</span>
                </div>

                <div class="card-body col-9 m-auto offset-2">

                    <div class="form-group grid-form-container">
                        <label for="caption" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label>

                        <input id="grid-form-item2" 
                                name="caption"
                                type="text" 
                                class="form-control @error('caption') is-invalid @enderror" 
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
                    
                    <div class="form-group grid-form-container">
                        <label for="image" class="col-form-label font-weight-bold" id="grid-form-item1">Obrázok</label>
                        <input type="file" class="form-control-file pb-3" id="grid-form-item2" name="image">

                        @error('image')
                                <strong>{{ $message }}</strong>                       
                        @enderror 
                    </div>

                    <div class="form-group grid-form-container">
                        <label for="text" class="col-form-label font-weight-bold" id="grid-form-item1">Text</label>

                        <textarea rows="3" cols="40"                                                            {{-- TEXT --}}
                            name="text"
                            id="grid-form-item2"
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
                        <button type="submit" class="btn btn-warning">Pridať príspevok</button>
                    </div>
                </div>
            </div>
        </form>

    @endsection
