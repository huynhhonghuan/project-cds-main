<!DOCTYPE html>
<html lang="en">

<head>
    {{--nhúng tĩnh header--}}
    @include('trangchu.layouts.head')
    {{--nhúng động style từ bên form kế thừa--}}
    @yield('style')
</head>

<body onload="hienthingaythang()">
    {{--nhúng tĩnh Navbar--}}
    @include('trangchu.layouts.navbar')
    {{--nhúng động Contents từ bên form kế thừa--}}
    @yield('content')
    {{--nhúng tĩnh Footer--}}
    @include('trangchu.layouts.footer')
    {{--nhúng động script từ bên form kế thừa--}}
    @yield('script')

</body>

</html>
