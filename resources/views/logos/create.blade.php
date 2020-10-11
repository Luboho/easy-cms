@extends('layouts.app')

@section('title', 'Nové Logo')

@section('content')
<div class="container">

    <form action="{{ route('logos.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            
            <div class="col-12 m-auto card-header align-items-center p-2">
                <span class="ml-3">Logo podniku</span>
            </div>
            <div class="card-body col-12 m-auto">

                <div class="form-group grid-form-container">
                    <label for="image" class="col-form-label font-weight-bold" id="grid-form-item1">Obrázok</label>
                    <input type="file" class="form-control-file pb-3 @error('image') is-invalid @enderror" id="grid-form-item2" name="image">

                    @error('image')
                        <span class="invalid-feedback" id="grid-form-item4">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

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
                        {{ old('caption3') }}
                    </textarea>
                    @error('caption3')
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