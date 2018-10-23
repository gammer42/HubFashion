@extends('layouts.admin')
@section('navbar')
    <a class="navbar-brand" href="#">Role Created by Authority</a>
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
                                    <h4 class="card-title">Create Role</h4>
                                    <p class="card-category">Authority can Create Role Here...</p>
                                </div>
                                <div class="card-body" >
                                    <form action="{{route('permission.store')}}" method="POST">
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
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Permission Name</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Display Name</label>
                                                    <input type="text" class="form-control" name="display_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Description</label>
                                                    <input type="text" class="form-control" name="description">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary pull-right">Create Permission</button>
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