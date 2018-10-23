@extends('layouts.master')

@section('head')
    <!-- faq -->
    <link href="{{asset('frontend/css/faq.css')}}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
    <!-- //header -->
	<!-- inner banner -->
	<div class="ibanner_w3 pt-sm-5 pt-3">
		<h4 class="head_agileinfo text-center text-capitalize text-center pt-5">
			<span>f</span>ashion
			<span>h</span>ub</h4>
	</div>
	<!-- //inner banner -->
    <!-- FAQ-help-page -->
    @include('partial.feature.faq')
    <!-- //FAQ-help-page -->

@endsection

@section('script')
    <!-- script for faq  tabs -->
    <script>
        $(function () {

            var menu_ul = $('.faq > li > ul'),
                menu_a = $('.faq > li > a');

            menu_ul.hide();

            menu_a.click(function (e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true, true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true, true).slideUp('normal');
                }
            });

        });
    </script>
    <!-- script for faq tabs -->
@endsection