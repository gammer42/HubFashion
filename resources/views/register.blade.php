@extends('layouts.master')

@section('content')
<!-- sign up Modal -->
<div class="modal fade" id="myModal_btn" tabindex="-1" role="dialog" aria-labelledby="myModal_btn" aria-hidden="true">
    <div class="agilemodal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pt-3 pb-5 px-sm-5">
                <div class="row">
                    <div class="col-md-6 mx-auto align-self-center">
                        <img src="{{asset('frontend/images/p3.png')}}" class="img-fluid" alt="login_image" />
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('user.store')}}" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @CSRF
                            <div class="form-group">
                                <label for="recipient-name1" class="col-form-label">Your Name</label>
                                <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder=" " name="first_name" id="recipient-name1" value="{{old('first_name')}}"  required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name1" class="col-form-label">User Name</label>
                                <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder=" " name="username" id="recipient-name1" value="{{old('username')}}"  required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-email" class="col-form-label">Email</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{old('email')}}"id="recipient-email"  required autofocus >
                            </div>
                            <div class="form-group">
                                <label for="password1" class="col-form-label">Password</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password1" required>
                            </div>
                            <div class="form-group">
                                <label for="password2" class="col-form-label">Confirm Password</label>
                                <input type="password" class="form-control" placeholder=" " name="password_confirmation" id="password2" required>
                            </div>
                            <div class="sub-w3l">
                                <div class="sub-agile">
                                    <input type="checkbox" id="brand2" value="">
                                    <label for="brand2" class="mb-3">
                                        <span></span>I Accept to the Terms & Conditions</label>
                                </div>
                            </div>
                            <div class="right-w3l">
                                <input type="submit" class="form-control" value="Register">
                            </div>
                        </form>
                        <p class="text-center mt-3">Already a member?
                            <a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-dark login_btn">
                                Login Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //signup modal -->
@endsection
