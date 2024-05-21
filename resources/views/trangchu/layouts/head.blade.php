{{-- nhúng tất cả các header --}}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<title>Chuyển đổi số Doanh Nghiệp An Giang</title>

 <!-- Hình ảnh logo con trên tab-->
 <link rel="shortcut icon" type="image/x-icon" href="{{ env('APP_URL') }}/assets/frontend/img/logo/logo.jpg">

 <!--Bootstrap CSS file nhớ cài npm i bootstrap@5.3.1 phiên bản tùy theo lấy file json-->
 <link rel="stylesheet" href="{{ env('APP_URL')}}/assets/bootstrap-5.0.2/dist/css/bootstrap.min.css">

 <!--datepicker-->
 <link rel="stylesheet" href="{{ env('APP_URL') }}/assets/datepicker/bootstrap-datetimepicker.min.css">

 <!--  font awesome icons  nhớ copy Folder webfont-->
 {{-- <link rel="stylesheet" href="{{ env('APP_URL') }}/assets/fontawesome-free-6.4.2-web/css/all.min.css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
 <!--Custom CSS file-->
 <link rel="stylesheet" href="{{ env('APP_URL') }}/assets/frontend/css/style.css"></link>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- Box Icon -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Aos JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
 {{-- message toastr --}}
 <link rel="stylesheet" href="{{ env('APP_URL') }}/assets/backend/css/toastr.min.css">
 <script src="{{ env('APP_URL') }}/assets/backend/js/toastr_jquery.min.js"></script>
 <script src="{{ env('APP_URL') }}/assets/backend/js/toastr.min.js"></script>

 <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v19.0" nonce="18q7swbU"></script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=65fc074295cfbf00121e87cd&product=inline-share-buttons&source=platform" async="async"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@yield('head'){{-- nhúng động head từ bên form kế thừa --}}
