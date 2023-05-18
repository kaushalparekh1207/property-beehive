@section('home_page')
    active
@endsection
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Property Beehive</title>
    @include('front.assets.links')
</head>


<body>

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div id="preloader">
    <div class="preloader"><span></span><span></span></div>
</div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    @include('front.assets.header')
        <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->




			<!-- ============================ Hero Banner End ================================== -->


            <div class="page-title" style="background:#017efa url({{url('/')}}/front/assets/img/page-title.png) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">


						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ All Property ================================== -->
			<section class="over-top micler gray-simple">

				<div class="container">

					<!-- Start Search -->
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="full-search-2 mt-2">
								<div class="hero-search-content colored">

									<div class="row classic-search-box m-0 gx-2">

										<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
											<div class="form-group briod">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="Ex. villa, town etc.">
													<i class="fa-solid fa-magnifying-glass"></i>
												</div>
											</div>
										</div>
										<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
												<div class="form-group briod">
													<div class="input-with-icon">
														<select class="form-control">
															<option value="1">Property types</option>
															<option value="2">Townhome</option>
															<option value="3">Office & Studio</option>
															<option value="4">Apartments</option>
															<option value="5">Condos</option>
															<option value="6">Bungalow</option>
															<option value="7">Farmhouse</option>
															<option value="8">Tiny House</option>
														</select>
														<i class="fa-solid fa-house-crack"></i>
													</div>
												</div>
											</div>
										<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
											<div class="form-group">
												<div class="input-with-icon">
													<select class="form-control">
														<option value="1">Select City</option>
														<option value="2">Huntingdon</option>
														<option value="3">Fenland</option>
														<option value="4">Aylesbury</option>
														<option value="5">Amersham</option>
														<option value="6">Macclesfield</option>
														<option value="7">Congleton</option>
														<option value="8">UNantwich</option>
													</select>
													<i class="fa-solid fa-location-crosshairs"></i>
												</div>
											</div>
										</div>
										<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
											<div class="fliox-search-wiop">
												<div class="form-group me-2">
													<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#filter" class="btn btn-filter-search"><i class="fa-solid fa-filter"></i>Filter</a>
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-primary full-width">Search</button>
												</div>
											</div>
										</div>

									</div>

								</div>
							</div>
						</div>
					</div>

					<!-- Start Shorting -->
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="item-shorting-box mt-4 bg-white border rounded px-3 py-3 mb-5">
								<div class="item-shorting clearfix">
									<div class="left-column"><h4 class="m-0 text-dark font--medium"><span>207</span> Results Found of 612</h4></div>
								</div>
								<div class="item-shorting-box-right">
									<div class="shorting-by">
										<select>
											<option value="0">Shorting By:</option>
											<option value="1">Low Price</option>
											<option value="2">High Price</option>
											<option value="3">Most Popular</option>
										</select>
									</div>
									<ul class="shorting-list">
										<li><a href="grid-full-style-1.html" class="border"><i class="fas fa-table-cells-large"></i></a></li>
										<li><a href="list-full-style-1.html" class="active border"><i class="fas fa-list"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<!-- Start All Listing -->
					<div class="row gx-3 gy-4">

						<!-- Single Property -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="veshm-list-prty">
								<div class="veshm-list-prty-figure">
									<div class="veshm-list-img-slide">
										<div class="veshm-list-click">
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-11.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-2.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-3.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-4.png" class="img-fluid mx-auto" alt=""></a></div>
										</div>
									</div>
								</div>
								<div class="veshm-list-prty-caption">
									<div class="veshm-list-kygf">
										<div class="veshm-list-kygf-flex">
											<div class="veshm-list-typess rent"><span>For Rent</span></div>
											<h5 class="rlhc-title-name verified"><a href="single-property-1.html" class="prt-link-detail">Agile Real Estate Group</a></h5>
											<div class="vesh-aget-rates">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<span class="resy-98">322 Reviews</span>
											</div>
										</div>
										<div class="veshm-list-head-flex">
											<button class="btn btn-like active" type="button"><i class="fa-solid fa-heart-circle-check"></i></button>
										</div>
									</div>
									<div class="veshm-list-middle">
										<div class="veshm-list-icons">
											<ul>
												<li><i class="fa-solid fa-bed"></i><span>3 Bed</span></li>
												<li><i class="fa-solid fa-bath"></i><span>2 Ba</span></li>
												<li><i class="fa-solid fa-vector-square"></i><span>2200 Sqft</span></li>
												<li><i class="fa-solid fa-calendar-days"></i><span>Built 2017</span></li>
											</ul>
										</div>
									</div>
									<div class="veshm-list-footers">
										<div class="veshm-list-ftr786">
											<div class="rlhc-price">
												<h4 class="rlhc-price-name theme-cl">$7,549<span class="monthly">/Months</span></h4>
											</div>
										</div>
										<div class="veshm-list-ftr1707">
											<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-md btn-primary font--medium">Send Offer</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Property -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="veshm-list-prty">
								<div class="veshm-list-prty-figure">
									<div class="veshm-list-img-slide">
										<div class="veshm-list-click">
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-12.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-6.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-7.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-8.png" class="img-fluid mx-auto" alt=""></a></div>
										</div>
									</div>
								</div>
								<div class="veshm-list-prty-caption">
									<div class="veshm-list-kygf">
										<div class="veshm-list-kygf-flex">
											<div class="veshm-list-typess rent"><span>For Rent</span></div>
											<h5 class="rlhc-title-name verified"><a href="single-property-1.html" class="prt-link-detail">Hearthstone Real Property</a></h5>
											<div class="vesh-aget-rates">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<span class="resy-98">210 Reviews</span>
											</div>
										</div>
										<div class="veshm-list-head-flex">
											<button class="btn btn-like active" type="button"><i class="fa-solid fa-heart-circle-check"></i></button>
										</div>
									</div>
									<div class="veshm-list-middle">
										<div class="veshm-list-icons">
											<ul>
												<li><i class="fa-solid fa-bed"></i><span>4 Bed</span></li>
												<li><i class="fa-solid fa-bath"></i><span>2 Ba</span></li>
												<li><i class="fa-solid fa-vector-square"></i><span>3200 Sqft</span></li>
												<li><i class="fa-solid fa-calendar-days"></i><span>Built 2020</span></li>
											</ul>
										</div>
									</div>
									<div class="veshm-list-footers">
										<div class="veshm-list-ftr786">
											<div class="rlhc-price">
												<h4 class="rlhc-price-name theme-cl">$10,590<span class="monthly">/Months</span></h4>
											</div>
										</div>
										<div class="veshm-list-ftr1707">
											<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-md btn-primary font--medium">Send Offer</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Property -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="veshm-list-prty">
								<div class="veshm-list-prty-figure">
									<div class="veshm-list-img-slide">
										<div class="veshm-list-click">
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-13.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-7.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-2.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-9.png" class="img-fluid mx-auto" alt=""></a></div>
										</div>
									</div>
								</div>
								<div class="veshm-list-prty-caption">
									<div class="veshm-list-kygf">
										<div class="veshm-list-kygf-flex">
											<div class="veshm-list-typess rent"><span>For Rent</span></div>
											<h5 class="rlhc-title-name verified"><a href="single-property-1.html" class="prt-link-detail">The Goldfinch Real Property</a></h5>
											<div class="vesh-aget-rates">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<span class="resy-98">452 Reviews</span>
											</div>
										</div>
										<div class="veshm-list-head-flex">
											<button class="btn btn-like active" type="button"><i class="fa-solid fa-heart-circle-check"></i></button>
										</div>
									</div>
									<div class="veshm-list-middle">
										<div class="veshm-list-icons">
											<ul>
												<li><i class="fa-solid fa-bed"></i><span>3 Bed</span></li>
												<li><i class="fa-solid fa-bath"></i><span>3 Ba</span></li>
												<li><i class="fa-solid fa-vector-square"></i><span>2100 Sqft</span></li>
												<li><i class="fa-solid fa-calendar-days"></i><span>Built 2021</span></li>
											</ul>
										</div>
									</div>
									<div class="veshm-list-footers">
										<div class="veshm-list-ftr786">
											<div class="rlhc-price">
												<h4 class="rlhc-price-name theme-cl">$8,999<span class="monthly">/Months</span></h4>
											</div>
										</div>
										<div class="veshm-list-ftr1707">
											<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-md btn-primary font--medium">Send Offer</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Property -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="veshm-list-prty">
								<div class="veshm-list-prty-figure">
									<div class="veshm-list-img-slide">
										<div class="veshm-list-click">
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-14.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-1.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-8.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-10.png" class="img-fluid mx-auto" alt=""></a></div>
										</div>
									</div>
								</div>
								<div class="veshm-list-prty-caption">
									<div class="veshm-list-kygf">
										<div class="veshm-list-kygf-flex">
											<div class="veshm-list-typess rent"><span>For Rent</span></div>
											<h5 class="rlhc-title-name verified"><a href="single-property-1.html" class="prt-link-detail">Dream Big Real Estate</a></h5>
											<div class="vesh-aget-rates">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<span class="resy-98">340 Reviews</span>
											</div>
										</div>
										<div class="veshm-list-head-flex">
											<button class="btn btn-like active" type="button"><i class="fa-solid fa-heart-circle-check"></i></button>
										</div>
									</div>
									<div class="veshm-list-middle">
										<div class="veshm-list-icons">
											<ul>
												<li><i class="fa-solid fa-bed"></i><span>4 Bed</span></li>
												<li><i class="fa-solid fa-bath"></i><span>3 Ba</span></li>
												<li><i class="fa-solid fa-vector-square"></i><span>2700 Sqft</span></li>
												<li><i class="fa-solid fa-calendar-days"></i><span>Built 2022</span></li>
											</ul>
										</div>
									</div>
									<div class="veshm-list-footers">
										<div class="veshm-list-ftr786">
											<div class="rlhc-price">
												<h4 class="rlhc-price-name theme-cl">$9,649<span class="monthly">/Months</span></h4>
											</div>
										</div>
										<div class="veshm-list-ftr1707">
											<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-md btn-primary font--medium">Send Offer</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Property -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="veshm-list-prty">
								<div class="veshm-list-prty-figure">
									<div class="veshm-list-img-slide">
										<div class="veshm-list-click">
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-10.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-10.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-3.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-4.png" class="img-fluid mx-auto" alt=""></a></div>
										</div>
									</div>
								</div>
								<div class="veshm-list-prty-caption">
									<div class="veshm-list-kygf">
										<div class="veshm-list-kygf-flex">
											<div class="veshm-list-typess rent"><span>For Rent</span></div>
											<h5 class="rlhc-title-name verified"><a href="single-property-1.html" class="prt-link-detail">Agile Real Estate Group</a></h5>
											<div class="vesh-aget-rates">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<span class="resy-98">322 Reviews</span>
											</div>
										</div>
										<div class="veshm-list-head-flex">
											<button class="btn btn-like active" type="button"><i class="fa-solid fa-heart-circle-check"></i></button>
										</div>
									</div>
									<div class="veshm-list-middle">
										<div class="veshm-list-icons">
											<ul>
												<li><i class="fa-solid fa-bed"></i><span>3 Bed</span></li>
												<li><i class="fa-solid fa-bath"></i><span>2 Ba</span></li>
												<li><i class="fa-solid fa-vector-square"></i><span>2200 Sqft</span></li>
												<li><i class="fa-solid fa-calendar-days"></i><span>Built 2017</span></li>
											</ul>
										</div>
									</div>
									<div class="veshm-list-footers">
										<div class="veshm-list-ftr786">
											<div class="rlhc-price">
												<h4 class="rlhc-price-name theme-cl">$7,549<span class="monthly">/Months</span></h4>
											</div>
										</div>
										<div class="veshm-list-ftr1707">
											<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-md btn-primary font--medium">Send Offer</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Property -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="veshm-list-prty">
								<div class="veshm-list-prty-figure">
									<div class="veshm-list-img-slide">
										<div class="veshm-list-click">
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-9.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-2.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-7.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-8.png" class="img-fluid mx-auto" alt=""></a></div>
										</div>
									</div>
								</div>
								<div class="veshm-list-prty-caption">
									<div class="veshm-list-kygf">
										<div class="veshm-list-kygf-flex">
											<div class="veshm-list-typess rent"><span>For Rent</span></div>
											<h5 class="rlhc-title-name verified"><a href="single-property-1.html" class="prt-link-detail">Hearthstone Real Property</a></h5>
											<div class="vesh-aget-rates">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<span class="resy-98">210 Reviews</span>
											</div>
										</div>
										<div class="veshm-list-head-flex">
											<button class="btn btn-like active" type="button"><i class="fa-solid fa-heart-circle-check"></i></button>
										</div>
									</div>
									<div class="veshm-list-middle">
										<div class="veshm-list-icons">
											<ul>
												<li><i class="fa-solid fa-bed"></i><span>4 Bed</span></li>
												<li><i class="fa-solid fa-bath"></i><span>2 Ba</span></li>
												<li><i class="fa-solid fa-vector-square"></i><span>3200 Sqft</span></li>
												<li><i class="fa-solid fa-calendar-days"></i><span>Built 2020</span></li>
											</ul>
										</div>
									</div>
									<div class="veshm-list-footers">
										<div class="veshm-list-ftr786">
											<div class="rlhc-price">
												<h4 class="rlhc-price-name theme-cl">$10,590<span class="monthly">/Months</span></h4>
											</div>
										</div>
										<div class="veshm-list-ftr1707">
											<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-md btn-primary font--medium">Send Offer</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Property -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="veshm-list-prty">
								<div class="veshm-list-prty-figure">
									<div class="veshm-list-img-slide">
										<div class="veshm-list-click">
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-8.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-4.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-2.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-9.png" class="img-fluid mx-auto" alt=""></a></div>
										</div>
									</div>
								</div>
								<div class="veshm-list-prty-caption">
									<div class="veshm-list-kygf">
										<div class="veshm-list-kygf-flex">
											<div class="veshm-list-typess rent"><span>For Rent</span></div>
											<h5 class="rlhc-title-name verified"><a href="single-property-1.html" class="prt-link-detail">The Goldfinch Real Property</a></h5>
											<div class="vesh-aget-rates">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<span class="resy-98">452 Reviews</span>
											</div>
										</div>
										<div class="veshm-list-head-flex">
											<button class="btn btn-like active" type="button"><i class="fa-solid fa-heart-circle-check"></i></button>
										</div>
									</div>
									<div class="veshm-list-middle">
										<div class="veshm-list-icons">
											<ul>
												<li><i class="fa-solid fa-bed"></i><span>3 Bed</span></li>
												<li><i class="fa-solid fa-bath"></i><span>3 Ba</span></li>
												<li><i class="fa-solid fa-vector-square"></i><span>2100 Sqft</span></li>
												<li><i class="fa-solid fa-calendar-days"></i><span>Built 2021</span></li>
											</ul>
										</div>
									</div>
									<div class="veshm-list-footers">
										<div class="veshm-list-ftr786">
											<div class="rlhc-price">
												<h4 class="rlhc-price-name theme-cl">$8,999<span class="monthly">/Months</span></h4>
											</div>
										</div>
										<div class="veshm-list-ftr1707">
											<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-md btn-primary font--medium">Send Offer</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Single Property -->
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="veshm-list-prty">
								<div class="veshm-list-prty-figure">
									<div class="veshm-list-img-slide">
										<div class="veshm-list-click">
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-7.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-5.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-8.png" class="img-fluid mx-auto" alt=""></a></div>
											<div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-10.png" class="img-fluid mx-auto" alt=""></a></div>
										</div>
									</div>
								</div>
								<div class="veshm-list-prty-caption">
									<div class="veshm-list-kygf">
										<div class="veshm-list-kygf-flex">
											<div class="veshm-list-typess rent"><span>For Rent</span></div>
											<h5 class="rlhc-title-name verified"><a href="single-property-1.html" class="prt-link-detail">Dream Big Real Estate</a></h5>
											<div class="vesh-aget-rates">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<span class="resy-98">340 Reviews</span>
											</div>
										</div>
										<div class="veshm-list-head-flex">
											<button class="btn btn-like active" type="button"><i class="fa-solid fa-heart-circle-check"></i></button>
										</div>
									</div>
									<div class="veshm-list-middle">
										<div class="veshm-list-icons">
											<ul>
												<li><i class="fa-solid fa-bed"></i><span>4 Bed</span></li>
												<li><i class="fa-solid fa-bath"></i><span>3 Ba</span></li>
												<li><i class="fa-solid fa-vector-square"></i><span>2700 Sqft</span></li>
												<li><i class="fa-solid fa-calendar-days"></i><span>Built 2022</span></li>
											</ul>
										</div>
									</div>
									<div class="veshm-list-footers">
										<div class="veshm-list-ftr786">
											<div class="rlhc-price">
												<h4 class="rlhc-price-name theme-cl">$9,649<span class="monthly">/Months</span></h4>
											</div>
										</div>
										<div class="veshm-list-ftr1707">
											<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer" class="btn btn-md btn-primary font--medium">Send Offer</a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<!-- Start Pagination -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<nav aria-label="Page navigation example">
								  <ul class="pagination">
									<li class="page-item">
									  <a class="page-link" href="JavaScript:Void(0);" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									  </a>
									</li>
									<li class="page-item"><a class="page-link" href="JavaScript:Void(0);">1</a></li>
									<li class="page-item"><a class="page-link" href="JavaScript:Void(0);">2</a></li>
									<li class="page-item"><a class="page-link" href="JavaScript:Void(0);">3</a></li>
									<li class="page-item"><a class="page-link" href="JavaScript:Void(0);">4</a></li>
									<li class="page-item"><a class="page-link" href="JavaScript:Void(0);">5</a></li>
									<li class="page-item"><a class="page-link" href="JavaScript:Void(0);">6</a></li>
									<li class="page-item">
									  <a class="page-link" href="JavaScript:Void(0);" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									  </a>
									</li>
								  </ul>
							</nav>
						</div>
					</div>

				</div>
			</section>




			<!-- ============================ Property Detail Start ================================== -->




    @include('front.assets.footer')

    @include('front.assets.modal')

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->


@include('front.assets.scripts')

</body>

</html>
