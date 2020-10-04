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
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                {{-- <div class="form-group grid-form-container">
                    <label for="caption1" class="col-form-label font-weight-bold" id="grid-form-item1">Veľký titulok</label>
                    <input type="text"
                        name="caption1"
                        id="grid-form-item2"
                        class="form-control @error('caption1') is-invalid @enderror"
                        value="{{ old('caption1') ?? $logo->caption1 }}"
                        autofocus>
                    @error('caption1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group grid-form-container">
                    <label for="caption2" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label>
                    <input type="text"
                        name="caption2"
                        id="grid-form-item2"
                        class="form-control @error('caption2') is-invalid @enderror"
                        value="{{ old('caption2') ?? $logo->caption2 }}"
                        autofocus>
                    @error('caption2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <div class="form-group grid-form-container pb-4">
                    <label for="caption3" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label>
                    <textarea rows="3" cols="50"
                        id="editor"
                        name="caption3"                                                                     {{-- TEXT --}}
                        type="caption3" 
                        class="form-control @error('caption3') is-invalid @enderror" 
                        caption="caption3" 
                        value="" 
                        autocomplete="caption3">
                        {{ old('caption3') ?? $logo->caption3 }}
                    </textarea>
                    @error('caption3')
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

</div>
@endsection