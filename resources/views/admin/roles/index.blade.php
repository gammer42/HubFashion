@extends('layouts.admin')

@section('head')

@endsection

@section('navbar')
    <a class="navbar-brand" id="user-b" style="display: block;" href="#" onclick="toggle_visibility('admin', 'user','user-b','admin-b');" title="View Authenticate Users table">View Authenticate Roles</a>
    <a class="navbar-brand" id="admin-b" style="display: none;" href="#" onclick="toggle_visibility('admin','user','user-b','admin-b');" title="View Customer Users table">View General Roles</a>
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
                                <div class="card-header card-header-success">
                                    @if(session('message'))
                                        <h3 style="text-align: center; color:snow; font-weight: bold;" class="card-title">{{session('message')}}</h3>
                                    @endif
                                </div>
                                <div class="card-header card-header-primary">
                                    <div class="col-md-4 "style="float:left;">
                                        <h4 class="card-title ">Authorized User Role</h4>
                                        <p class="card-category">Authorized Users Role Table</p>
                                    </div>
                                    <div class="col-md-4" style="float:left;">
                                        <h4 class="card-title"><a  class="nav-link navbar-brand" href="{{route('roles.create')}}"  title="Create New Role">Create New Role</a></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="table_id">
                                            <thead class=" text-primary">
                                            <th>
                                                SL No
                                            </th>
                                            <th>
                                                Display Name
                                            </th>
                                            <th>
                                                Role Name
                                            </th>
                                            <th style="max-width:300px;">
                                                Description
                                            </th>
                                            <th  class="action-btn">
                                                Action
                                            </th>
                                            </thead>
                                            <tbody>
                                            <?php $i=0; ?>
                                            @foreach($authRoles as $authRole)
                                                <tr style="background:#202940;">
                                                    <td>
                                                        {{ ++$i }}
                                                    </td>
                                                    <td>
                                                        {{ $authRole->display_name }}
                                                    </td>
                                                    <td>
                                                        <span class="label success">{{ $authRole->name }}</span>
                                                    </td>
                                                    <td>
                                                        {!! $authRole->description !!}
                                                    </td>
                                                    <td class="center">
                                                        <a class="m-btn btn btn-success" href="{{route('roles.show',$authRole->id)}}">
                                                            <i class="material-icons">search</i>
                                                        </a>
                                                        <a class="m-btn btn btn-info" href="{{route('roles.edit',$authRole->id)}}">
                                                            <i class="material-icons">settings</i>
                                                        </a>
                                                        <form style="display: inline !important;" action="{{route('roles.destroy', $authRole->id)}}" method="POST">
                                                            @CSRF
                                                            @METHOD('DELETE')
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
                        <div class="col-md-12" id="user" style="display: block;">
                        <div class="card">
                            <div class="card-header card-header-success">
                                @if(session('message'))
                                    <h3 style="text-align: center; color:snow; font-weight: bold;" class="card-title">{{session('message')}}</h3>
                                @endif
                            </div>
                            <div class="card-header card-header-primary">
                                <div class="col-md-4 "style="float:left;">
                                    <h4 class="card-title ">General User Role</h4>
                                    <p class="card-category">General Users Role Table</p>
                                </div>
                                <div class="col-md-4" style="float:left;">
                                    <h4 class="card-title"><a  class="nav-link navbar-brand" href="{{route('roles.create')}}"  title="Create New Role">Create New Role</a></h4>
                                </div>
                            </div>
                            <div class="card-body"  id="table_id">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            SL No
                                        </th>
                                        <th>
                                            Display Name
                                        </th>
                                        <th>
                                            Role Name
                                        </th>
                                        <th style="max-width:300px;">
                                            Description
                                        </th>
                                        <th class="action-btn">
                                            Action
                                        </th>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; ?>
                                        @foreach($genRoles as $genRole)
                                            <tr style="background:#202940;">
                                                <td>
                                                    {{ ++$i }}
                                                </td>
                                                <td>
                                                    {{ $genRole->display_name }}
                                                </td>
                                                <td>
                                                    <span class="label success">{{ $genRole->name }}</span>
                                                </td>
                                                <td>
                                                    {!! $genRole->description !!}
                                                </td>
                                                <td class="center">
                                                    <a class="m-btn btn btn-success" href="{{route('roles.show',$genRole->id)}}">
                                                        <i class="material-icons">search</i>
                                                    </a>
                                                    <a class="m-btn btn btn-info" href="{{route('roles.edit',$genRole->id)}}">
                                                        <i class="material-icons">settings</i>
                                                    </a>
                                                    <form style="display: inline !important;" action="{{route('roles.destroy', $genRole->id)}}" method="POST">
                                                        @CSRF
                                                        @METHOD('DELETE')
                                                    <button type="submit" class="m-btn btn btn-danger" title="Delete User" onclick="return confirmDel()">
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

        function confirmDel() {
            let del = confirm('Are you sure to delete this Role?');
            if(del)
                return true;
            else
                return false;
        }
    </script>

@endsection
