@extends('layouts.master')

@section('head')
    <!-- flexslider-css -->
    <link rel="stylesheet" href="{{asset('frontend/css/flexslider.css')}}" type="text/css" media="screen" />
@endsection

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
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Girl's Clothing</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- Shop -->
    @include('partial.feature')
    <!--// Shop -->
@endsection

@section('script')
        <!-- price range (top products) -->
        <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
        <script>
            //<![CDATA[ 
            $(window).load(function () {
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 9000,
                    values: [50, 6000],
                    slide: function (event, ui) {
                        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                    }
                });
                $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range")
                    .slider(
                        "values", 1));

            }); //]]>
        </script>
        <!-- //price range (top products) -->
@endsection