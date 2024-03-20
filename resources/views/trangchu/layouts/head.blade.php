{{--nhúng tất cả các header--}}
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

 <title>Chuyển đổi số</title>

 <!-- Hình ảnh logo con trên tab-->
 <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('assets/frontend/img/logo/logo-1.png') }}">

 <!--Bootstrap CSS file nhớ cài npm i bootstrap@5.3.1 phiên bản tùy theo lấy file json-->
 <link rel="stylesheet" href="{{ URL::to('assets/bootstrap-5.0.2/dist/css/bootstrap.min.css') }}">

 <!--datepicker-->
 <link rel="stylesheet" href="{{ URL::to('assets/datepicker/bootstrap-datetimepicker.min.css') }}">

 <!--  font awesome icons  nhớ copy Folder webfont-->
 <link rel="stylesheet" href="{{ URL::to('assets/fontawesome-free-6.4.2-web/css/all.min.css') }}">

 <!--Custom CSS file-->
 <link rel="stylesheet" href="{{ URL::to('assets/frontend/css/style.css') }}"></link>

  <!-- Box Icon -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
 {{-- message toastr --}}
 <link rel="stylesheet" href="{{ URL::to('assets/backend/css/toastr.min.css') }}">
 <script src="{{ URL::to('assets/backend/js/toastr_jquery.min.js') }}"></script>
 <script src="{{ URL::to('assets/backend/js/toastr.min.js') }}"></script>

 @yield('head'){{--nhúng động head từ bên form kế thừa--}}
