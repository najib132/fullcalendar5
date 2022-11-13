@extends('layouts.templatelogin')
@section('content')



    <br> 
    

    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="assets/images/login2.jpg" class="brand_logo" alt="Logo">
                </div>
            </div>

            <div class="d-flex justify-content-center form_container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        
                        
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control input_user @error('name') is-invalid @enderror" placeholder="name" autocomplete="name" required autofocus>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input type="password" name="password" id="inputPassword" class="form-control input_pass" autocomplete="current-password" required>
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="button" class="btn login_btn">Connexion</button>
                    </div>
                </form>
            </div>

 
        </div>
    </div>





@endsection