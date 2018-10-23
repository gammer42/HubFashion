@extends('layouts.admin')
@section('navbar')
    <a class="navbar-brand" href="#">Role Updated by Authority</a>
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
                                    <h4 class="card-title">Update Role</h4>
                                    <p class="card-category">Authority can Update Role Here...</p>
                                </div>
                                <div class="card-body" >
                                    <form action="{{route('roles.update',$roles->id)}}" method="POST">
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
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Role Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $roles->name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Display Name</label>
                                                    <input type="text" class="form-control" name="display_name" value="{{ $roles->display_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Description</label>
                                                    <input type="text" class="form-control" name="description" value="{{ $roles->description }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Roles Type</label>
                                                    <div>
                                                        <input type="radio" id="authorized"
                                                               name="roles_type" value="1" {{ $roles->roles_type == 1? "checked":"" }}/>
                                                        <label for="authorized">Authorized Role Type</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" id="general" name="roles_type" value="0"  {{ $roles->roles_type == 0? "checked":"" }}/>
                                                        <label for="general">General Role Type</label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Permission</label>
                                                    <input type="checkbox" id="inlineCheckbox1" onclick="toggle(this)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    @foreach($permissions as $permission)
                                                        <div class="col-md-6" style="float:left;">
                                                            <label class="checkbox inline">
                                                                <input name="permissions[]" class="selectAll" type="checkbox"  value="{{$permission->id}}" {{ in_array($permission->id,$checked)? "checked":"" }}>
                                                                {{$permission->display_name}}
                                                            </label>
                                                        </div>
                                                    @endforeach
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
                                    </form>
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

    @include('admin.partial.script')
@endsection

@section('script')
    <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;

        function checkPermission() {
            let checkBox = document.getElementById("checkBox");
            let permissionBox = document.getElementById("permissionBox");
            if (checkBox.checked !== true){
                permissionBox.style.display = "block";
            } else {
                permissionBox.style.display = "none";
            }
        }

        function toggle(source) {
            let checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] !== source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>



@endsection