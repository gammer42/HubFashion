<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('partial.construct.head')

<body>
    @include('partial.construct.header')

    @yield('content')

    @include('partial.construct.footer')

    {{--@yield('modal')--}}

    @include('partial.construct.script')

</body>

</html>
