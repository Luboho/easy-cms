@extends('layouts.app')

@section('title', 'Nové Logo')

@section('content')
<div class="container">

    <form action="{{ route('logos.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            
            <div class="col-9 m-auto offset-2 card-header align-items-center p-2">
                <span class="ml-3">Logo podniku</span>
            </div>
            <div class="card-body col-9 m-auto offset-2">

                <div class="form-group grid-form-container">
                    <label for="image" class="col-form-label font-weight-bold" id="grid-form-item1">Obrázok</label>
                    <input type="file" class="form-control-file pb-3 @error('image') is-invalid @enderror" id="grid-form-item2" name="image">

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group grid-form-container">
                    <label for="caption1" class="col-form-label font-weight-bold" id="grid-form-item1">Veľký titulok</label>
                    <input type="text"
                        name="caption1"
                        id="grid-form-item2"
                        class="form-control @error('caption1') is-invalid @enderror"
                        value="{{ old('caption1') }}"
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
                        value="{{ old('caption2') }}"
                        autofocus>
                    @error('caption2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group grid-form-container pb-4">
                    <label for="caption3" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label>
                    <input type="text"
                            name="caption3"
                            id="grid-form-item2"
                            class="form-control  @error('caption3') is-invalid @enderror"
                            value="{{ old('caption3') }}"
                            autofocus>
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