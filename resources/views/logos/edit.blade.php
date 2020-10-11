@extends('layouts.app')

@section('title', 'Editácia Loga')

@section('content')

<div class="container">

    <form action="/logos/{{ $logo->id }}" enctype="multipart/form-data" method="post">
        @method('PATCH')
        @csrf

        <div class="row">

            <div class="col-12 m-auto card-header align-items-center p-2">
                <span class="ml-3">Upraviť logo podniku</span>
            </div>

            <div class="card-body col-12 m-auto">

                <div class="form-group grid-form-container">
                    <label for="image" class="col-form-label font-weight-bold" id="grid-form-item1">Obrázok</label>
                    <input type="file" class="form-control-file pb-3 align-self-center @error('image') is-invalid @enderror" id="grid-form-item2" name="image">
                    <img src="/storage/{{ $logo->image }}" id="grid-form-item1" class="w-50 h-auto rounded shadow">

                    @error('image')
                        <span class="invalid-feedback" id="grid-form-item4">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            {{-- Text --}}
                <div class="form-group grid-form-container pb-4">
                    <label for="text" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label>
                    <textarea rows="3" cols="50"
                        id="editor"
                        name="text"                                                                     
                        type="text" 
                        class="form-control @error('text') is-invalid @enderror" 
                        caption="text" 
                        value="" 
                        autocomplete="text">
                        {{ old('text') ?? $logo->text }}
                    </textarea>
                    @error('text')
                        <span class="invalid-feedback" id="grid-form-item4" role="alert">
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

</div>
@endsection