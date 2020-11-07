@include('header_files')
@include('menu_pages')
<!-- ======= Hero Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>About</h2>
                <ol>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>About</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <?php
    $myportfolios12 = DB::table('my_about_uses')
        ->select('about_tile', 'about_details', 'about_status', 'about_image')
        ->where('about_status', 'A')
        ->limit(1)
        ->get();
    ?>

    @foreach($myportfolios12 as $myportfolios12)
        <section id="about" class="about">
            <div class="container">

                <div class="row content">
                    <div class="col-lg-6">
                        <img src="{{URL::to($myportfolios12->about_image)}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h2>{{$myportfolios12->about_tile}}</h2>
                        <p>{{$myportfolios12->about_details}}</p>

                        <ul>
                            <li><i class="ri-check-double-line"></i> Fastest Delivery </li>
                            <li><i class="ri-check-double-line"></i> So Much to Choose From</li>
                            <li><i class="ri-check-double-line"></i> Hasslefree and Quick</li>
                            <li><i class="ri-check-double-line"></i> Always Available</li>

                        </ul>
                        <p class="font-italic">
                            We deliver the best products to you.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->
@endforeach

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Team</h2>
                <p>Our Hardowrking Team</p>
            </div>

            <div class="row">

                <div class="col-lg-6 mt-4">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="{{asset('public/assets/img/team/2as.jpg')}}" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Shahriar Haque</h4>
                            <span>Managing Director</span>
                            <div class="social">
                                <a href=""><i class="ri-twitter-fill"></i></a>
                                <a href="https://www.facebook.com/shahriar.emon.927" target="_blank"><i class="ri-facebook-fill"></i></a>
                                <a href=""><i class="ri-instagram-fill"></i></a>
                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section><!-- End Team Section -->


</main><!-- End #main -->


@include("footer_page")
@include("footer_bar")