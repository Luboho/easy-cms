{{-- Contact Form for Customers --}}
@if(! session()->has('message'))
    
        <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        
            <div class="row">
                <div class="pl-5 pr-5 pt-3 rounded border" style="color:silver;">
                
                    <p class="ml-sm-n4 font-weight-bold">Napíšte nám</p> 

                    <div class="form-group row">
                        <label for="name" class="mt-3 col-md-4 col-form-label">Meno</label>

                        <input type="text" 
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror bg-secondary text-light" 
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror      
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label">Email</label>

                        <input type="text" 
                            name="email" 
                            class="form-control @error('email') is-invalid @enderror bg-secondary text-light" 
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror   
                    </div>

                    <div class="form-group row">
                        <label for="message" class="col-md-4 col-form-label">Správa</label>

                        <textarea  
                            name="message" 
                            rows="3"
                            cols="30"
                            class="form-control @error('message') is-invalid @enderror bg-secondary text-light" 
                            value="{{ old('message') }}">
                        </textarea>
                        @error('message')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror     
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-warning">Poslať správu</button>
                    </div>
                    
                </div>
            </div>
        </form>
    @endif
