{{-- Contact Form for Customers --}}
@if(! session()->has('message'))
    
        <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        
            <div class="row">
                <div class="pl-5 pr-5 pt-3 rounded border" style="color:silver;">
                
                    <p class="ml-sm-n4 font-weight-bold">Napíšte nám</p> 

                    <div class="form-group row">
                        <label for="contact-us-name" class="mt-3 col-md-4 col-form-label">Meno *</label>

                        <input type="text" 
                            name="contact-us-name" 
                            class="form-control @error('contact-us-name') is-invalid @enderror bg-secondary text-light" 
                            value="{{ old('contact-us-name') }}">
                        @error('contact-us-name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror      
                    </div>

                    <div class="form-group row">
                        <label for="contact-us-email" class="col-md-4 col-form-label">Email *</label>

                        <input type="text" 
                            name="contact-us-email" 
                            class="form-control @error('contact-us-email') is-invalid @enderror bg-secondary text-light" 
                            value="{{ old('contact-us-email') }}">
                        @error('contact-us-email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror   
                    </div>

                    <div class="form-group row">
                        <label for="contact-us-message" class="col-md-4 col-form-label">Správa *</label>

                        <textarea  
                            name="contact-us-message" 
                            rows="3"
                            cols="30"
                            class="form-control @error('contact-us-message') is-invalid @enderror bg-secondary text-light" 
                            value="{{ old('contact-us-message') }}">
                        </textarea>
                        @error('contact-us-message')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror     
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="border btn">Poslať správu</button>
                    </div>
                    
                </div>
            </div>
        </form>
    @endif
