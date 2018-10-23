@extends('layouts.admin')
@section('navbar')
    <a class="navbar-brand" href="#">User Created by Authority</a>
@endsection
@section('content')

    <div class="wrapper ">

        @include('admin.partial.sidebar')

        <div class="main-panel">
            <!-- Navbar -->
        @include('admin.partial.nav')


        <!--  User Details -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Create User</h4>
                                    <p class="card-category">Authority can Create Here...</p>
                                </div>
                                <div class="card-body" >
                                    <form action="{{route('admin-user.store')}}" method="POST">
                                        @CSRF
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <span><br/></span></div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">First Name <span style="color:red">*</span></label>
                                                    <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{old('first_name')}}" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Last Name <span style="color:red">*</span></label>
                                                    <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{old('last_name')}}" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Username <span style="color:red">*</span></label>
                                                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{old('username')}}" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Email address <span style="color:red">*</span></label>
                                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{old('email')}}" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{--<label class="bmd-label-floating">Designation (Role)</label>--}}
                                                    <select style="color:#888D9B;" class="form-control" name="role">
                                                        <label class="bmd-label-floating">Designation (Role) <span style="color:red">*</span></label>
                                                        @foreach($roles as $role)
                                                            <option style="background-color:#202940;" name="role" value="{{ $role->id }}">{{ $role->display_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">User Type</label>
                                                    <div>
                                                        <input type="radio" id="authorized"
                                                               name="type" value="1"/>
                                                        <label for="authorized">Authorized</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" id="general"
                                                               name="type" value="0"  checked/>
                                                        <label for="general">General</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">User Status</label>
                                                    <div>
                                                        <input type="radio" id="activate"
                                                               name="status" value="1" checked />
                                                        <label for="activate">Activate</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" id="deactivate"
                                                               name="status" value="0" />
                                                        <label for="deactivate">Deactivate</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Create Password <span style="color:red">*</span></label>
                                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" >Confirm Password <span style="color:red">*</span></label>
                                                    <input type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary pull-right">Create User</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button class="btn btn-primary pull-right" type="reset" ><a href="{{route('admin-user.index')}}" >Cancel</a></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--<div class="col-md-4">--}}
                            {{--<div class="card card-profile">--}}
                                {{--<div class="card-avatar">--}}
                                    {{--<a href="#pablo">--}}
                                        {{--<img class="img" src="{{asset('assets/img/faces/marc.jpg')}}" />--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="card-body">--}}
                                    {{--<h6 class="card-category">CEO / Co-Founder</h6>--}}
                                    {{--<h4 class="card-title">Alec Thompson</h4>--}}
                                    {{--<p class="card-description">--}}
                                        {{--Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...--}}
                                    {{--</p>--}}
                                    {{--<a href="#pablo" class="btn btn-primary btn-round">Follow</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>


            <!-- Footer -->
            @include('admin.partial.footer')
        </div>
    </div>

    {{--@include('admin.partial.plugin')--}}

@endsection