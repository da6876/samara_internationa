@include('header_files')
@include('menu_pages')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
        <?php
        $myportfolios122 = DB::table('web_site_sliders')
            ->select('slider_id', 'slider_title', 'slider_details', 'slider_image', 'slider_status')
            ->where('slider_status', 'A')
            ->limit(1)
            ->get();
        ?>

        @foreach($myportfolios122 as $myportfolios122)
            <!-- Slide 1 -->
                <div class="carousel-item {{ $loop->first ? 'active' : ''}}"
                     style="background-image: url({{URL::to($myportfolios122->slider_image)}})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">{{$myportfolios122->slider_title}}</h2>
                            <p class="animate__animated animate__fadeInUp">{{$myportfolios122->slider_details}}</p>
                            <a href="{{url('AboutUs')}}" class="btn-get-started animate__animated animate__fadeInUp scrollto">See
                                More</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
</section><!-- End Hero -->


<main id="main">

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

<!-- ======= Clients Section ======= -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Service</h2>
                <p>The Services We Offer</p>
            </div>

            <div class="row">

                <?php
                $services = DB::table('our_services')
                    ->select('services_id', 'services_name', 'services_details', 'services_icon', 'services_status')
                    ->where('services_status', 'A')
                    ->limit(6)
                    ->get();
                ?>
                @foreach($services as $service)
                    <div class="col-md-6">
                        <div class="icon-box">
                            <i class="icofont-computer"></i>
                            <h4><a href="#">{{$service->services_name}}</a></h4>
                            <p>{{$service->services_details}}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>Portfolio</h2>
                <p>Recent Works</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <?php
                        $myportfolios = DB::table('work_main_menus')
                            ->select('work_main_menu_name', 'work_main_menu_details', 'work_main_menu_type', 'work_main_menu_status', 'work_main_menu_image')
                            ->where('work_main_menu_status', 'A')
                            ->groupBy('work_main_menu_type')
                            ->get();
                        //$Test=DB::statement('SELECT `work_main_menu_id`, `work_main_menu_name`, `work_main_menu_details`, `work_main_menu_type`, `work_main_menu_image`, `work_main_menu_status`, `created_at`, `updated_at` FROM `work_main_menus` WHERE `work_main_menu_status`="A" GROUP BY `work_main_menu_type`');
                        ?>
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach($myportfolios as $myportfolios)
                            <li data-filter=".{{$myportfolios->work_main_menu_type}}">{{$myportfolios->work_main_menu_name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">

                <?php
                $myportfolios1 = DB::table('work_main_menus')
                    ->select('work_main_menu_name', 'work_main_menu_details', 'work_main_menu_type', 'work_main_menu_status', 'work_main_menu_image')
                    ->where('work_main_menu_status', 'A')
                    ->limit(10)
                    ->get();
                //$Test=DB::statement('SELECT `work_main_menu_id`, `work_main_menu_name`, `work_main_menu_details`, `work_main_menu_type`, `work_main_menu_image`, `work_main_menu_status`, `created_at`, `updated_at` FROM `work_main_menus` WHERE `work_main_menu_status`="A" GROUP BY `work_main_menu_type`');
                ?>

                @foreach($myportfolios1 as $myportfolios1)

                    <div class="col-lg-4 col-md-6 portfolio-item {{$myportfolios1->work_main_menu_type}}">
                        <div class="portfolio-wrap">
                            <img src="{{URL::to($myportfolios1->work_main_menu_image)}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{$myportfolios1->work_main_menu_name}}</h4>
                                <p>{{$myportfolios1->work_main_menu_details}}</p>
                                <div class="portfolio-links">
                                    <a href="{{URL::to($myportfolios1->work_main_menu_image)}}"
                                       data-gall="portfolioGallery" class="venobox" title="App 1"><i
                                                class="bx bx-plus"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

        </div>
    </section><!-- End Portfolio Section -->

</main><!-- End #main -->

@include("footer_page")
@include("footer_bar")