<footer>
    <!-- Footer Start-->
    <div class="footer-main" data-background="<?= base_url() ?>template1/assets/img/gallery/section_bg4.png">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-2  col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="<?= base_url() ?>template1/assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3  col-lg-3 col-lg-2 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>II SALON</h4>
                                <ul>
                                    <p>Jadikan Moment spesial kamu bersama kami</p>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2  col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>ABOUT US</h4>
                                <ul>
                                    <li><a href="#">Follow & Contact us :</a></li>
                                    <li><a href="#">Fb : ii Salon & wWedding Service</a></li>
                                    <li><a href="#">Fb : Lily Herliani</a></li>
                                    <li><a href="#">Instagram : @ii_salon</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2  col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>LOCATION</h4>
                                <ul>
                                    <li><a href="#"></a></li>
                                    <li>Jalan raya Cinembeuy rt 001/001 Kec. Lebakwangi Kab. Kuningan Jawa Barat 45574</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- JS here -->

<script src="<?= base_url() ?>template1/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= base_url() ?>template1/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?= base_url() ?>template1/assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>template1/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= base_url() ?>template1/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= base_url() ?>template1/assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>template1/assets/js/slick.min.js"></script>
<!-- Date Picker -->
<script src="<?= base_url() ?>template1/assets/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?= base_url() ?>template1/assets/js/wow.min.js"></script>
<script src="<?= base_url() ?>template1/assets/js/animated.headline.js"></script>
<script src="<?= base_url() ?>template1/assets/js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="<?= base_url() ?>template1/assets/js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url() ?>template1/assets/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() ?>template1/assets/js/jquery.sticky.js"></script>

<!-- counter , waypoint -->
<script src="<?= base_url() ?>template1/assets/js/jquery.counterup.min.js"></script>
<script src="<?= base_url() ?>template1/assets/js/waypoints.min.js"></script>

<!-- contact js -->
<script src="<?= base_url() ?>template1/assets/js/contact.js"></script>
<script src="<?= base_url() ?>template1/assets/js/jquery.form.js"></script>
<script src="<?= base_url() ?>template1/assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>template1/assets/js/mail-script.js"></script>
<script src="<?= base_url() ?>template1/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?= base_url() ?>template1/assets/js/plugins.js"></script>
<script src="<?= base_url() ?>template1/assets/js/main.js"></script>

<script src="<?= base_url() ?>assets/bootstrap-datepicker/js/jQuery-2.1.4.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $("#btn_send_chat").click(function() {
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?= site_url('Pesanan/send_mgs_chat') ?>',
                data: {
                    'msg': $('#text_message_chat').val(),
                    'id_pelanggan': $('#text_id_pelanggan').val()
                },
                success: function(msg) {
                    console.log(msg);
                    //alert('wow' + msg);
                    $('.direct-chat-messages').append('<div class="single-comment"> <div class = "content"><h4> Anda <span>' + msg.time_chatting + ' </span></h4><p>' + msg.isi + '</p></div></div>');
                }
            });
            $('#text_message_chat').val('');
            $('#text_message_chat').focus();
        });
    });
</script>

</body>

</html>