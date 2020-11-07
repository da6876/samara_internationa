<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>Samara International</h3>
                        <p>
                            Asakusa (6,251.42 mi)<br>
                            Taito-ku, Tokyo, Japan 111-0023
                            <br><br>
                            <strong>Phone:</strong> +81 80-3348-8956<br>
                            <strong>Email:</strong> samarainternational17@gmail.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="https://www.facebook.com/Samara-international-342745223067220/" class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>
                <?php
                $services = DB::table('our_services')
                    ->select('services_id', 'services_name', 'services_details', 'services_icon', 'services_status')
                    ->where('services_status', 'A')
                    ->limit(6)
                    ->get();
                ?>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>

                        @foreach($services as $service)
                            <li><i class="bx bx-chevron-right"></i> <a
                                        href="#{{$service->services_name}}">{{$service->services_name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Stay With Us and Follow Us In Here</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>

                </div>

            </div>
        </div>
    </div>