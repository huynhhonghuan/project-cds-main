<!DOCTYPE html>
<html lang="en">

<head>
    {{-- nhúng tĩnh header --}}
    @include ('trangquanly.layouts.header')
    {{-- nhúng động style trực tiếp trên form kế thừa --}}
    @yield('style')
</head>

<body>
    <div class="main-wrapper">
        {{-- nhúng tĩnh Navbar --}}
        @include('trangquanly.doanhnghiep.includes.navbar')
        {{-- nhúng tĩnh Sidebar --}}
        @include('trangquanly.doanhnghiep.includes.sidebar')
        {{-- nhúng động Contents từ form kế thừa --}}
        @yield('content')
    </div>
    {{-- nhúng tĩnh footer --}}
    @include('trangquanly.layouts.footer')
    {{-- nhúng động script trực tiếp trên form kế thừa --}}
    @yield('script')
</body>

</html>
