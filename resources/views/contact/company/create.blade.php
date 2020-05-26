{{-- Company Data Form --}}
@extends('layouts.app')

@section('title', 'Vytvoriť podnikové údaje')

@section('content')

    <div class="container">
        <form action="{{ route('company.store') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">
                
                <div class="col-9 offset-2 m-auto offset-2 card-header align-items-center p-2">
                    <span>Vytvoriť podnikové údaje</span>
                </div>
                
                <div class="card-body col-9 m-auto offset-2">

                    <div class="form-group grid-form-container">
                        <label for="mobile" class="col-form-lable font-weight-bold" id="grid-form-item1">Mobil</label>
                        <input type="text"
                            name="mobile"
                            class="form-control @error('mobile') is-invalid @enderror"
                            id="grid-form-item2"
                            value="{{ old('mobile') }}"
                            autocomplete="mobile"
                            autofocus>
                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror     
                    </div>

                    <div class="form-group grid-form-container">
                        <label for="phone" class="col-form-lable font-weight-bold" id="grid-form-item1">Pevná linka</label>
                        <input type="text"
                            name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            id="grid-form-item2"
                            value="{{ old('phone') }}"
                            autocomplete="phone"
                            autofocus>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group grid-form-container">

                        <label for="facebook" class="col-form-lable font-weight-bold" id="grid-form-item1">Facebook</label>
                        <input type="text"
                            name="facebook"
                            class="form-control @error('facebook') is-invalid @enderror"
                            id="grid-form-item2"
                            value="{{ old('facebook') }}"
                            autocomplete="facebook"
                            autofocus>
                        @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror     
                    
                    </div>

                    <div class="form-group grid-form-container">

                        <label for="openHours" class="col-form-lable font-weight-bold" id="grid-form-item1">Otvorené</label>
                        <input type="text"
                            name="openHours"
                            class="form-control @error('openHours') is-invalid @enderror"
                            id="grid-form-item2"
                            value="{{ old('openHours') }}"
                            autocomplete="openHours"
                            autofocus>
                        @error('openHours')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror     
                    
                    </div>

                    <div class="form-group grid-form-container">

                        <label for="name" class="col-form-lable font-weight-bold" id="grid-form-item1">Názov</label>
                        <input type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            id="grid-form-item2"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror     
                    
                    </div>

                    <div class="form-group grid-form-container">

                        <label for="street" class="col-form-lable font-weight-bold" id="grid-form-item1">Ulica</label>
                        <input type="text"
                            name="street"
                            class="form-control @error('street') is-invalid @enderror"
                            id="grid-form-item2"
                            value="{{ old('street') }}"
                            autocomplete="street"
                            autofocus>
                        @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror     
                    
                    </div>

                    <div class="form-group grid-form-container">

                        <label for="city" class="col-form-lable font-weight-bold" id="grid-form-item1">Mesto</label>
                        <input type="text"
                            name="city"
                            class="form-control @error('city') is-invalid @enderror"
                            id="grid-form-item2"
                            value="{{ old('city') }}"
                            autocomplete="city"
                            autofocus>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror     
                    
                    </div>
                    
                    <div class="pt-1 text-center">
                        <button type="submit" class="btn btn-warning">Vytvoriť</button>
                    </div>
                    
                </div>
            </div>
            
        </form>
    </div>

@endsection