@extends('layouts.admin')

@section('head')

@endsection

@section('navbar')
	<a class="navbar-brand" href="#" title="View Customer Users table">Category Table</a>
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
										<h4 class="card-title ">Category</h4>
										<p class="card-category">Category Table</p>
									</div>
									<div class="col-md-4" style="float:left;">
										<h4 class="card-title"><a  class="nav-link navbar-brand" href="{{route('categories.create')}}"  title="Create New Role">{{ __('Create New Category') }}</a></h4>
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
												Category Name
											</th>
											<th>
												Slug
											</th>
											<th>
												Parent
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
                                            @foreach($roots as $category)
												<tr style="background:#202940;">
													<td>
														{{ ++$i }}
													</td>
													<td>
														{{ $category->name }}
													</td>
													<td>
														{{ $category->slug }}
													</td>
													<td>
														<span class="label success">{{ __('Root Parent') }}</span>
													</td>
													<td>
                                                        @if($category->status == 1)
                                                            <span class="label success">{{ __('Active') }}</span>
                                                        @else
                                                            <span class="label warning">{{ __('Inactive') }}</span>
                                                        @endif
													</td>
													<td class="center">
														<a class="m-btn btn btn-success" href="{{route('categories.show',$category->id)}}">
															<i class="material-icons">search</i>
														</a>
														<a class="m-btn btn btn-info" href="{{route('categories.edit',$category->id)}}">
															<i class="material-icons">settings</i>
														</a>
                                                        <form style="display: inline !important;" action="{{route('categories.destroy', $category->id)}}" method="POST">
                                                            @CSRF
                                                            @METHOD('DELETE')
                                                            <button type="submit" class="m-btn btn btn-danger" title="Delete User" onclick="return confirmDel()">
                                                                <i class="material-icons">delete</i>
                                                            </button>
                                                        </form>
													</td>
												</tr>
											@endforeach
											@foreach($categories as $category)
												<tr style="background:#202940;">
													<td>
														{{ ++$i }}
													</td>
													<td>
														{{ $category->name }}
													</td>
													<td>
														{{ $category->slug }}
													</td>
													<td>
														<span class="label success">{{ $category->parent_name }}</span>
													</td>
													<td>
                                                        @if($category->status == 1)
                                                            <span class="label success">{{ __('Active') }}</span>
                                                        @else
                                                            <span class="label warning">{{ __('Inactive') }}</span>
                                                        @endif
													</td>
													<td class="center">
														<a class="m-btn btn btn-success" href="{{route('categories.show',$category->id)}}">
															<i class="material-icons">search</i>
														</a>
														<a class="m-btn btn btn-info" href="{{route('categories.edit',$category->id)}}">
															<i class="material-icons">settings</i>
														</a>
                                                        <form style="display: inline !important;" action="{{route('categories.destroy', $category->id)}}" method="POST">
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

        @include('admin.partial.script')
	</script>

@endsection
