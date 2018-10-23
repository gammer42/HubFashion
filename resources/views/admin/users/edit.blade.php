@extends('layouts.admin')
@section('navbar')
    <a class="navbar-brand" href="#">User Updated by Authority</a>
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
                                    <h4 class="card-title">Update User</h4>
                                    <p class="card-category">Authority can update here</p>
                                </div>
                                <div class="card-body" >
                                    <form action="{{route('admin-user.update', $users->id)}}" method="POST">
                                    <fieldset>
                                        @CSRF
                                        @METHOD('PUT')
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
                                                    <label class="bmd-label-floating">First Name</label>
                                                    <input type="text" class="form-control" name="first_name" value="{{$users->first_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" value="{{$users->last_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Username</label>
                                                    <input type="text" class="form-control" name="username" value="{{ $users->username }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Email address</label>
                                                    <input type="email" class="form-control" name="email" value="{{ $users->email }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select style="image-color:#888D9B" class="form-control input-lg" name="role">
                                                        <label class="bmd-label-floating">Designation(Role)</label>
                                                        @foreach($roles as $role)
                                                        <option style="background-color:#202940" name="role" value="{{ $role->id }}" {{ $role->id == $given_roles[0]->role_id ? "selected":"" }}>{{ $role->display_name }}</option>
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
                                                               name="type" value="1" {{$users->user_type == 1? "checked":""}}/>
                                                        <label for="authorized">Authorized</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" id="general"
                                                               name="type" value="0" {{$users->user_type == 0? "checked":""}}/>
                                                        <label for="general">General</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">User Status</label>
                                                    <div>
                                                        <input type="radio" id="activate"
                                                               name="status" value="1" {{$users->user_status == 1? "checked":""}} />
                                                        <label for="activate">Activate</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" id="deactivate"
                                                               name="status" value="0" {{$users->user_status == 0? "checked":""}} />
                                                        <label for="deactivate">Deactivate</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Old Password</label>
                                                    <input type="password" class="form-control" name="old_password" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">New Password</label>
                                                    <input type="password" class="form-control" name="password" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" >Confirm New Password</label>
                                                    <input type="password" class="form-control" name="password_confirmation" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary pull-right">Update User</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button class="btn btn-primary pull-right" type="reset" ><a href="{{route('admin-user.index')}}" >Cancel</a></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="card card-profile">
                        <div class="card-avatar">
                        <a href="#pablo">
                        <img class="img" src="{{asset('assets/img/faces/marc.jpg')}}" />
                        </a>
                        </div>
                        <div class="card-body">
                        <h6 class="card-category">CEO / Co-Founder</h6>
                        <h4 class="card-title">Alec Thompson</h4>
                        <p class="card-description">
                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            @include('admin.partial.footer')
        </div>
    </div>

    {{--@include('admin.partial.plugin')--}}

@endsection