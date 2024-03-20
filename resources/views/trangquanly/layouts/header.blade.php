{{-- nhúng tất cả các header --}}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
{{-- nhúng title --}}
<title>Hotel Dashboard</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('assets/backend/img/favicon.png') }}">
<link rel="stylesheet" href="{{ URL::to('assets/backend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/backend/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/backend/plugins/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/backend/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/backend/css/feathericon.min.css') }}">
<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
<link rel="stylesheet" href="{{ URL::to('assets/backend/plugins/morris/morris.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/backend/css/style.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ URL::to('assets/backend/css/bootstrap-datetimepicker.min.css') }}">

<link rel="stylesheet" href="{{ URL::to('assets/fontawesome-free-6.4.2-web/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/fontawesome-free-6.4.2-web/css/all.min.css') }}">

{{-- message toastr --}}
<link rel="stylesheet" href="{{ URL::to('assets/backend/css/toastr.min.css') }}">
<script src="{{ URL::to('assets/backend/js/toastr_jquery.min.js') }}"></script>
<script src="{{ URL::to('assets/backend/js/toastr.min.js') }}"></script>


@yield('head'){{-- nhúng header động từ form kế thừa --}}
