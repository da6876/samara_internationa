<div class="container">
    <div class="copyright">
        &copy; Copyright <strong><span>Samara International</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="http://www.sourceofcapacity.com/">Source Of Capacity</a>
    </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('public/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('public/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('public/assets/js/main.js')}}"></script>
<script>
    //insert Data By Ajax
    save_method = "addContact";
    $(function () {
        $('#add-contact-data form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                if (save_method == "addContact") {
                    url = "{{ url('MyContactUsInfos') }}";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: new FormData($("#add-contact-data form")[0]),
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            $('.modal-bodys').find('textarea,input').val('');
                            var dataResult = JSON.parse(data);
                            if (dataResult.statusCode == 200) {
                                swal({
                                    title: "Success",
                                    text: dataResult.msg,
                                    icon: "success",
                                    button: "Ok"
                                });
                            } else {
                                swal({
                                    title: "Oops",
                                    text: dataResult.statusMsg,
                                    icon: "error",
                                    timer: '1500'
                                });
                            }

                        }, error: function (data) {
                            swal({
                                title: "Oops",
                                text: 'Eorr',
                                icon: "error",
                                timer: '3500'
                            });
                        }
                    });
                    //return false;
                }
            }
        });
    });

</script>
</body>

</html>