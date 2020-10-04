@extends('layouts.app')

@section('title', 'Priestory - nový príspevok')

    @section('content')

        <form action="/rooms" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">

                <div class="col-11 m-auto card-header align-items-center p-2">
                    <span class="ml-3">Príspevok do priestorov reštaurácie</span>
                </div>

                <div class="card-body col-11 m-auto">

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
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
            
                    </div>  
                    
                    <div class="form-group grid-form-container">
                        <label for="image" class="col-form-label font-weight-bold" id="grid-form-item1">Obrázok<span class="text-danger"> *</span></label>
                        <div>
                            <input type="file" class="form-control-file pb-3" id="grid-form-item2" name="image">

                            @error('image')
                                <span class="text-danger" role="alert">{{ $message }}</span>                       
                            @enderror
                        </div> 
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
                            autocomplete="text">{{ old('text') }}
                        </textarea>

                        @error('text')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
            
                    </div>

                    <div class="pt-1 text-center">
                        <button type="submit" class="btn btn-warning">Pridať príspevok</button>
                    </div>
                </div>
            </div>
        </form>

    @endsection
