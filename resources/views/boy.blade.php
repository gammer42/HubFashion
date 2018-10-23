@extends('layouts.master')

@section('content')
	<!-- inner banner -->
	<div class="ibanner_w3 pt-sm-5 pt-3">
		<h4 class="head_agileinfo text-center text-capitalize text-center pt-5">
			<span>f</span>ashion
			<span>h</span>ub</h4>
	</div>
	<!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('index')}}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('boy')}}">Boy's Clothing</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Single Product</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- Single -->
    @include('partial.feature.single')
    <!-- /new_arrivals -->
    @include('partial.feature.trends')
    <!--// Single -->
@endsection