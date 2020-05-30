@extends('layouts.app')

@section('title', 'Jedálny lístok - vytvoriť')

@section('content')
<div class="container">

    <form action="{{ route('alacarte.store') }}" enctype="multipart/form-data" method="post">

        @csrf
        <div class="row">

            <div class="col-9 offset-2 m-auto offset-2 card-header align-items-center p-2">
                <span>Príspevok do menu lístka</span>
            </div>

            <div class="card-body col-9 m-auto offset-2">

                <div class="form-group grid-form-container">
                    <label for="caption" class="col-form-label font-weight-bold" id="grid-form-item1">Titulok</label>      {{--Caption--}}
    
                    <input id="grid-container2" 
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
                    <label for="image" class="col-form-label font-weight-bold" id="grid-form-item1">Obrázok <span class="text-danger">*</span></label>     {{--Image--}}
                    <div>
                        <input type="file" class="form-control-file pb-3" id="grid-form-item2" name="image">
                    
                        @error('image')
                            <span class="text-danger" role="alert">{{ $message }}</span>                       
                        @enderror
                    </div> 
                </div>

                <div class="pt-1 text-center">
                    <button class="btn btn-warning">Pridať príspevok</button>
                </div>

            </div>

        </div>
    </form>
</div>
        
@endsection