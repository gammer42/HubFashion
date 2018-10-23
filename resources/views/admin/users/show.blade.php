@extends('layouts.admin')

@section('head')

@endsection

@section('navbar')
    @if($users->user_type == true)
        <a class="navbar-brand" style="display: block;" href="#">Authorized User</a>
    @else
        <a class="navbar-brand" style="display: block;" href="#">General User</a>
    @endif
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <div class="col-md-4 "style="float:left;">
                                        <h4 class="card-title ">User</h4>
                                        <p class="card-category">User's Table</p>
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
                                                <tr style="background:#202940;">
                                                    <td>
                                                        {{ $users->id }}
                                                    </td>
                                                    <td>
                                                        {{ $users->first_name}} {{ $users->last_name }}
                                                    </td>
                                                    </td>
                                                    <td>
                                                        @foreach($users->roles as $role)
                                                            {{ $role->display_name }}
                                                        @endforeach
                                                    <td>
                                                        {{ $users->user_status == true ? "Active": "Inactive" }}
                                                    </td>
                                                    <td class="center">
                                                        <a class="btn m-btn btn-success" href="{{route('admin-user.show',$users->id)}}">
                                                            <i class="material-icons">search</i>
                                                        </a>
                                                        <a class="btn m-btn btn-info" href="{{route('admin-user.edit',$users->id)}}">
                                                            <i class="material-icons">settings</i>
                                                        </a>
                                                        <form style="display: inline !important;" action="{{route('admin-user.destroy',$users->id)}}" method="POST">
                                                            @CSRF
                                                            @METHOD('PUT')
                                                        <button type="submit" title="Delete User" class="btn m-btn btn-danger" onclick="return confirmDelete()">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                        </form>
                                                    </td>
                                                </tr>
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
