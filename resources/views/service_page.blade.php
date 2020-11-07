@include('header_files')
@include('menu_pages')
<!-- ======= Hero Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Services</h2>
                <ol>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Services</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

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

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title">
                <h2>Features</h2>
                <p>Check our Features</p>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <?php
                        $services1 = DB::table('our_services')
                            ->select('services_id', 'services_name', 'services_details', 'services_icon', 'services_status')
                            ->where('services_status', 'A')
                            ->limit(6)
                            ->get();
                        $all_slider = 3;
                        ?>

                        @foreach($services1 as $services1)
                                <li class="nav-item">
                                    <a class="nav-link {{ $loop->first ? 'active' : ''}} show" data-toggle="tab" href="#{{$services1->services_name}}">{{$services1->services_name}}</a>
                                </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">

                        <?php
                        $services2 = DB::table('our_services')
                            ->select('services_id', 'services_name', 'services_details', 'services_icon', 'services_status')
                            ->where('services_status', 'A')
                            ->limit(6)
                            ->get();
                        ?>
                        @foreach($services2 as $services2)
                        <div class="tab-pane {{ $loop->first ? 'active' : ''}} show" id="{{$services2->services_name}}">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>{{$services2->services_name}}</h3>
                                    <p class="font-italic">{{$services2->services_details}}</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{asset('public/assets/img/features-1.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->


@include("footer_page")
@include("footer_bar")