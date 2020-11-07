@include('header_files')
@include('menu_pages')
<!-- ======= Hero Section ======= -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Portolio</h2>
                <ol>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Portolio</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

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