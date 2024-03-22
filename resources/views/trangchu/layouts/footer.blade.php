{{-- nhúng tất cả thành phần của footer --}}
<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted" style="border-top: 3px solid #009688; ">
    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-2 text-dark mb-2 text-dark" style="display:flex;justify-content-center">
                        <img src="{{ env('APP_URL') }}/assets/frontend/img/logo/footer_logo-1.png" alt="logo"
                            class="me-2"></i>Chuyển đổi số
                    </h6>
                    <p>
                        Cung cấp thông tin về chuyển đổi số cho doanh nghiệp và hệ thống tư vấn chuyển đổi số cho doanh
                        nghiệp vừa và nhỏ.
                    </p>
                    <div>
                        <a href="" class="me-4 link-secondary text-decoration-none">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="me-4 link-secondary text-decoration-none">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="me-4 link-secondary text-decoration-none">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="me-4 link-secondary text-decoration-none">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" class="me-4 link-secondary text-decoration-none">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="" class="me-4 link-secondary text-decoration-none">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-2 text-dark">
                        Tin tức
                    </h6>
                    <p>
                        <a href="{{ env('APP_URL') }}/tintuc/NongNghiep" class="text-reset text-decoration-none">Nông nghiệp</a>
                    </p>
                    <p>
                        <a href="{{ env('APP_URL') }}/tintuc/CongNghiep" class="text-reset text-decoration-none">Công nghiệp</a>
                    </p>
                    <p>
                        <a href="{{ env('APP_URL') }}/tintuc/TMDV" class="text-reset text-decoration-none">Thương mại & dịch vụ</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-2 text-dark">Liên hệ</h6>
                    <p><i class="fas fa-home me-3 text-secondary"></i> 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố
                        Long Xuyên, An Giang</p>
                    <p>
                        <i class="fas fa-envelope me-3 text-secondary"></i>
                        angiang@agu.edu.vn
                    </p>
                    <p><i class="fas fa-phone me-3 text-secondary"></i> + 84 0296 6256 565</p>
                    <p><i class="fas fa-print me-3 text-secondary"></i> + 84 296 3842560</p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-4 mx-auto">
                    <div class="map" >
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7849.272319015193!2d!3d10.3716558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a731e7546fd7b%3A0x953539cd7673d9e5!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBBbiBHaWFuZyAtIMSQSFFHIFRQSENN!5e0!3m2!1svi!2s!4v1710994386040!5m2!1svi!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: #009688;color: #fff">
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
