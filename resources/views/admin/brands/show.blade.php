@extends('layouts.admin')

@section('head')

@endsection

@section('navbar')
    <a class="navbar-brand" href="#" title="View Customer Users table">Brands</a>
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
                        <div class="col-md-12" id="admin" style="display: block;">
                            <div class="card">
                                <div class="card-header card-header-success">
                                    @if(session('message'))
                                        <h3 style="text-align: center; color:snow; font-weight: bold;" class="card-title">{{session('message')}}</h3>
                                    @endif
                                </div>
                                <div class="card-header card-header-primary">
                                    <div class="col-md-4 "style="float:left;">
                                        <h4 class="card-title ">Brands</h4>
                                        <p class="card-category">Brands Table</p>
                                    </div>
                                    <div class="col-md-4" style="float:left;">
                                        <h4 class="card-title"><a  class="nav-link navbar-brand" href="{{route('brands.create')}}"  title="Create New Role">{{ __('Create New Brands') }}</a></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="table_id">
                                            <thead class=" text-primary">
                                            <thead class=" text-primary">
                                            <th style="width: 50px;">
                                                SL No
                                            </th>
                                            <th style="width: 120px;">
                                                Name
                                            </th>
                                            <th style="width: 120px;">
                                                Slug
                                            </th>
                                            <th style="width: 350px;">
                                                Category
                                            </th>
                                            <th style="width: 100px;">
                                                Status
                                            </th>
                                            <th class="action-btn">
                                                Action
                                            </th>
                                            </thead>
                                            <tbody>
                                            <?php $i=0; ?>
                                                <tr style="background:#202940;">
                                                    <td>
                                                        {{ ++$i }}
                                                    </td>
                                                    <td>
                                                        {{ $brands->name }}
                                                    </td>
                                                    <td>
                                                        {{ $brands->slug }}
                                                    </td>
                                                    <td>
                                                        @foreach($categories as $category)
                                                        <span class="label spacial mod-btn-other">{{ $category->name }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($brands->status == 1)
                                                            <span class="label success">{{ __('Active') }}</span>
                                                        @else
                                                            <span class="label warning">{{ __('Inactive') }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="center">
                                                        <a class="m-btn btn btn-success" href="{{route('brands.show',$brands->id)}}">
                                                            <i class="material-icons">search</i>
                                                        </a>
                                                        <a class="m-btn btn btn-info" href="{{route('brands.edit',$brands->id)}}">
                                                            <i class="material-icons">settings</i>
                                                        </a>
                                                        <form style="display: inline !important;" action="{{route('brands.destroy', $brands->id)}}" method="POST">
                                                            @CSRF
                                                            @METHOD('DELETE')
                                                            <button type="submit" class="m-btn btn btn-danger" title="Delete Brand" onclick="return confirmDel()">
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
            let del = confirm('Are you sure to delete this Category?');
            if(del)
                return true;
            else
                return false;
        }

    </script>

@endsection
