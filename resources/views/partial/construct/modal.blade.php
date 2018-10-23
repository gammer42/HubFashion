{{--<!-- sign up Modal -->--}}
{{--<div class="modal fade" id="myModal_btn" tabindex="-1" role="dialog" aria-labelledby="myModal_btn" aria-hidden="true">--}}
    {{--<div class="agilemodal-dialog modal-dialog" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title">Register Now</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">×</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body pt-3 pb-5 px-sm-5">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-6 mx-auto align-self-center">--}}
                        {{--<img src="{{asset('frontend/images/p3.png')}}" class="img-fluid" alt="login_image" />--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<form action="{{route('user.store')}}" method="POST">--}}
                            {{--@if ($errors->any())--}}
                                {{--<div class="alert alert-danger">--}}
                                    {{--<ul>--}}
                                        {{--@foreach ($errors->all() as $error)--}}
                                            {{--<li>{{ $error }}</li>--}}
                                        {{--@endforeach--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                            {{--@CSRF--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="recipient-name1" class="col-form-label">Your Name</label>--}}
                                {{--<input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder=" " name="first_name" id="recipient-name1" value="{{old('first_name')}}"  required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="recipient-name1" class="col-form-label">User Name</label>--}}
                                {{--<input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder=" " name="username" id="recipient-name1" value="{{old('username')}}"  required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="recipient-email" class="col-form-label">Email</label>--}}
                                {{--<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{old('email')}}"id="recipient-email"  required autofocus >--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="password1" class="col-form-label">Password</label>--}}
                                {{--<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password1" required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="password2" class="col-form-label">Confirm Password</label>--}}
                                {{--<input type="password" class="form-control" placeholder=" " name="password_confirmation" id="password2" required>--}}
                            {{--</div>--}}
                            {{--<div class="sub-w3l">--}}
                                {{--<div class="sub-agile">--}}
                                    {{--<input type="checkbox" id="brand2" value="">--}}
                                    {{--<label for="brand2" class="mb-3">--}}
                                        {{--<span></span>I Accept to the Terms & Conditions</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="right-w3l">--}}
                                {{--<input type="submit" class="form-control" value="Register">--}}
                            {{--</div>--}}
                        {{--</form>--}}
                        {{--<p class="text-center mt-3">Already a member?--}}
                            {{--<a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-dark login_btn">--}}
                                {{--Login Now</a>--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- //signup modal -->--}}
{{--<!-- signin Modal -->--}}
{{--<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1" aria-hidden="true">--}}
    {{--<div class="agilemodal-dialog modal-dialog" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalLabel">Login</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">×</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body  pt-3 pb-5 px-sm-5">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-6 align-self-center">--}}
                        {{--<img src="{{asset('frontend/images/p3.png')}}" class="img-fluid" alt="login_image" />--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<form action="{{route('login')}}" method="post">--}}
                            {{--@csrf--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="recipient-name" class="col-form-label">{{ __('Email Address') }}</label>--}}
                                {{--<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder=" " name="email" id="recipient-email" value="{{ old('email') }}" required autofocus>--}}
                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-form-label">{{ __('Password') }}</label>--}}
                                {{--<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder=" " name="password" required>--}}
                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<div class="col-md-12 offset-md-3">--}}
                                    {{--<div class="form-check">--}}
                                        {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                        {{--<label class="form-check-label" for="remember">--}}
                                            {{--{{ __('Remember Me') }}--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row mb-0">--}}
                                {{--<div class="col-md-12 offset-md-1">--}}
                                    {{--<button type="submit" class="btn btn-primary">--}}
                                        {{--{{ __('Login') }}--}}
                                    {{--</button>--}}

                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- signin Modal -->--}}
