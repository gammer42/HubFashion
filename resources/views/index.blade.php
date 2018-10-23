@extends('layouts.master')

@section('content')
    <!-- banner -->
    @include('partial.feature.banner')
    <!-- //banner -->
    <!--services-->
    @include('partial.feature.service')
    <!-- //services-->
    <!-- about -->
    @include('partial.feature.about')
    <!-- //about -->
    <!-- product tabs -->
    @include('partial.feature.products')
    <!-- //product tabs -->
    <!-- insta posts -->
    @include('partial.feature.insta')
    <!-- //insta posts -->
@endsection
<!-- footer -->
<!-- //footer -->
<!-- sign up Modal -->
@section('modal')
    @include('partial.construct.modal')
@endsection
<!-- signin Modal -->
<!-- js -->
