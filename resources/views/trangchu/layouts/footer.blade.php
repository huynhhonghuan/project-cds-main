{{-- nhúng tất cả thành phần của footer --}}
<!-- Footer -->
<footer class="text-center text-lg-start text-muted" style="background: #fffeee;border-top: 1px solid #f7c51e;" >
    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start">
            <!-- Grid row -->
            <div class="row mt-3" style="margin-bottom: 10px">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-2 mb-2 text-dark" style="display:flex;justify-content-center">
                        <img src="{{ env('APP_URL') }}/assets/frontend/img/logo/logox.png" alt="logo"
                            class="me-2" style="width: 42px">
                            <span style="font-size: 24px; font-family: monospace; font-weight: bolder">Chuyển đổi số</span>
                    </h6>
                    <p style="text-align: justify;color: #000">
                        Cung cấp thông tin về chuyển đổi số cho doanh nghiệp và hệ thống tư vấn chuyển đổi số cho doanh
                        nghiệp vừa và nhỏ.
                    </p>
                    
                </div>
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-4 mx-auto">
                    <h6 style="font-size: 24px; font-family: monospace; font-weight: bolder;color:#000">Liên kết </h6>
                    <div style="margin-top: 24px">
                        <a target="_blank" href="https://www.facebook.com/cdsdnnvvag" class="me-4 text-decoration-none" style="background-color:#3b5998; border-radius: 50%;padding:10px 8px; padding-left:12px">
                            <i class='bx bxl-facebook' style="font-size: 16px; color: #fff"></i>
                        </a>
                        <a href="" class="me-4 text-decoration-none" style="background-color:#24a3f1; border-radius: 50%;padding:10px 8px; padding-left:12px">
                            <i class="fab fa-twitter" style="font-size: 16px; color: #fff"></i>
                        </a>
                        <a href="" class="me-4 text-decoration-none" style="background: linear-gradient(-40deg, #285eab, #fd5949, #fdf497 ); border-radius: 50%;padding:10px 8px; padding-left:12px">
                            <i class="fab fa-instagram" style="font-size: 16px; color: #fff"></i>
                        </a>
                        <a target="_blank" href="https://www.youtube.com/@chuyendoisodnnvv" class="me-4 text-decoration-none" style="background-color:#f70000; border-radius: 50%;padding:12px;">
                            <i class="fa-brands fa-youtube" style="font-size: 16px; color: #fff"></i>
                        </a>
                    </div>
                </div>
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-4 mx-auto">
                    <div class="map" style="border: 1px solid #f7c51e;border-radius: 10px">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7849.272319015193!2d!3d10.3716558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a731e7546fd7b%3A0x953539cd7673d9e5!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBBbiBHaWFuZyAtIMSQSFFHIFRQSENN!5e0!3m2!1svi!2s!4v1710994386040!5m2!1svi!2s" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-2" style="background-color: #f7c51e;color: #000">
        © Copyright {{ date('Y') }} tỉnh An Giang<span style="padding: 0 15px;">|</span>
        ® Chuyển đổi số online giữ bản quyền<span style="padding: 0 15px;">|</span>
        Thiết kế và xây dựng bởi
        <a class="text-reset fw-bold" href="https://fit.agu.edu.vn/" style="color: #fff; font-weight: bold;">FIT -
            TRƯỜNG ĐH AN GIANG</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<!--Jqurey js file-->
<script src="{{ env('APP_URL') }}/assets/jquery/jquery.3.7.1.js"></script>

<!--Bootstrap js file-->
<script src="{{ env('APP_URL') }}/assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!--Datepicker-->
<script src="{{ env('APP_URL') }}/assets/datepicker/bootstrap-datepicker.min.js"></script>

<!--custom js file-->
<script src="{{ env('APP_URL') }}/assets/frontend/js/main.js"></script>

@yield('footer')
