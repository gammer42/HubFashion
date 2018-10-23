@extends('layouts.admin')

@section('head')

@endsection

@section('navbar')
    <a class="navbar-brand" id="user-b" style="display: block;" href="#" onclick="toggle_visibility('admin', 'user','user-b','admin-b');" title="View Authenticate Users table">View Authenticate User</a>
    <a class="navbar-brand" id="admin-b" style="display: none;" href="#" onclick="toggle_visibility('admin','user','user-b','admin-b');" title="View Customer Users table">View General User</a>

@endsection

@section('content')

    <div class="wrapper ">

        @include('admin.partial.sidebar')


        <div class="main-panel">
            <!-- Navbar -->
            @include('admin.partial.nav')
            <!-- End Navbar -->

            <!-- User List Table  -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12" id="admin" style="display: none;">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    @if(session('message'))
                                        <h3 style="text-align: center; color:#8b6812; font-weight: bold;" class="card-title">{{session('message')}}</h3>
                                    @endif
                                </div>
                                <div class="card-header card-header-primary">
                                    <div class="col-md-4 "style="float:left;">
                                        <h4 class="card-title ">Authority</h4>
                                        <p class="card-category">Authorized Users Table</p>
                                    </div>
                                    <div class="col-md-4" style="float:left;">
                                        <h4 class="card-title"><a  class="nav-link navbar-brand" href="{{route('admin-user.create')}}"  title="Create New User">Create New User</a></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Role (Designation)
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th class="action-btn">
                                                Action
                                            </th>
                                            </thead>
                                            <tbody>
                                            <?php $i=0; ?>
                                            @foreach($admins as $admin)
                                                <tr style="background:#202940;">
                                                    <td>
                                                        {{ ++$i }}
                                                    </td>
                                                    <td>
                                                        {{ $admin->first_name}} {{ $admin->last_name }}
                                                    </td>
                                                    <td>
                                                        @foreach($admin->roles as $role)
                                                            {!! $role->name !!}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($admin->user_status == true)
                                                            <label class="label success">Active</label>
                                                        @else
                                                            <label class="label success">Inactive</label>
                                                        @endif

                                                    </td>
                                                    <td class="center">
                                                        <a class="m-btn btn btn-success" href="{{route('admin-user.show',$admin->id)}}">
                                                            <i class="material-icons">search</i>
                                                        </a>
                                                        <a class="m-btn btn btn-info" href="{{route('admin-user.edit',$admin->id)}}">
                                                            <i class="material-icons">settings</i>
                                                        </a>
                                                        <form style="display: inline !important;" action="{{route('admin-user.destroy',$admin->id)}}" method="POST">
                                                            @CSRF
                                                            @METHOD('PUT')
                                                            <button type="submit" title="Delete User" class="m-btn btn btn-danger" onclick="return confirmDelete()">
                                                                <i class="material-icons">delete</i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" id="user" style="display: block;">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                @if(session('message'))
                                    <h3 style="text-align: center; color:darkred; font-weight: bold;" class="card-title">{{session('message')}}</h3>
                                @endif
                            </div>
                            <div class="card-header card-header-primary">
                                <div class="col-md-4 "style="float:left;">
                                    <h4 class="card-title ">General User</h4>
                                    <p class="card-category">General User's Table</p>
                                </div>
                                <div class="col-md-4" style="float:left;">
                                <h4 class="card-title"><a  class="nav-link navbar-brand" href="{{route('admin-user.create')}}"  title="Create New User">Create New User</a></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Role (Designation)
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th class="action-btn">
                                            Action
                                        </th>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; ?>
                                        @foreach($generals as $general)
                                            <tr style="background:#202940;">
                                                <td>
                                                    {{ ++$i }}
                                                </td>
                                                <td>
                                                    {{ $general->first_name, $general->last_name }}
                                                </td>
                                                <td>
                                                    @foreach($general->roles as $role)
                                                        {!! $role->name !!}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($general->user_status == true)
                                                        <label class="label success">Active</label>
                                                    @else
                                                        <label class="label danger">Inactive</label>
                                                    @endif
                                                </td>
                                                <td class="center">
                                                    <a class="m-btn btn btn-success" href="{{route('admin-user.show',$general->id)}}">
                                                        <i class="material-icons">search</i>
                                                    </a>
                                                    <a class="m-btn btn btn-info" href="{{route('admin-user.edit',$general->id)}}">
                                                        <i class="material-icons">settings</i>
                                                    </a>
                                                    <form style="display: inline !important;" action="{{route('admin-user.destroy', $general->id)}}" method="POST">
                                                    <button type="submit" class="m-btn btn btn-danger" title="Delete User" onclick="return confirmDelete()">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>


            <!--  Footer  -->

            @include('admin.partial.footer')

        </div>
    </div>
    @include('admin.partial.script')
@endsection

@section('script')

    <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
    </script>

    <script>
        function toggle_visibility(id1,id2,id3,id4) {
            let a = document.getElementById(id1);
            let u = document.getElementById(id2);
            let ab = document.getElementById(id3);
            let ub = document.getElementById(id4);
            a.style.display = ((a.style.display!=='none') ? 'none' : 'block');
            u.style.display = ((u.style.display!=='none') ? 'none' : 'block');
            ab.style.display = ((ab.style.display!=='none') ? 'none' : 'block');
            ub.style.display = ((ub.style.display!=='none') ? 'none' : 'block');
        }

        function confirmDelete(){
            let del = confirm('Are You Sure to Delete this User?');
            if(del)
                return true;
            else
                return false;
        }
    </script>

@endsection
