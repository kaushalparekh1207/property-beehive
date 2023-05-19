<!--
|--------------------------------------------------------------------------
| Login Modal Starts
|--------------------------------------------------------------------------
-->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-close"></i></span>
            <div class="modal-header">
                <div class="mdl-thumb"><img src="{{ url('/') }}/front/assets/img/brand/PROPERTY_BEEHIVE_LOGO.png"
                        class="img-fluid" width="200" alt=""></div>
                <div class="mdl-title">
                    <h4 class="modal-header-title">Hello, Again</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="modal-login-form">
                    <form id="loginForm" method="post" action="{{ route('loginUser') }}">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="number" class="form-control" placeholder="Contact Number" name="contact_no"
                                id="login_contact"
                                @if (Cookie::has('saved_input')) value="{{ Cookie::get('saved_input') }}" @endif
                                required>
                            <label>Contact Number</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                id="login_password"
                                @if (Cookie::has('saved_password')) value="{{ Cookie::get('saved_password') }}" @endif
                                required>
                            <label>Password</label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Log
                                In</button>
                        </div>

                        <div class="modal-flex-item mb-3">
                            <div class="modal-flex-first">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    @if (Cookie::has('saved_name')) checked @endif>
                                    <label class="form-check-label" for="remember">Save Password</label>
                                </div>
                            </div>
                            <div class="modal-flex-last">
                                <a href="JavaScript:Void(0);">Forget Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="social-login">
                    <ul>
                        <li><a href="JavaScript:Void(0);" class="btn connect-fb"><i
                                    class="fa-brands fa-facebook"></i>Facebook</a></li>
                        <li><a href="JavaScript:Void(0);" class="btn connect-google"><i
                                    class="fa-brands fa-google"></i>Google+</a></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <p>Don't have an account yet?<a href="{{ route('sign_up') }}" class="theme-cl font--bold ms-1">Sign
                        Up</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!--
|--------------------------------------------------------------------------
| Login Modal Edns
|--------------------------------------------------------------------------
-->



<!--
|--------------------------------------------------------------------------
| Filter Modal Starts
|--------------------------------------------------------------------------
-->
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filtermodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered filter-popup" role="document">
        <div class="modal-content" id="filtermodal">
            <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-close"></i></span>
            <div class="modal-header">
                <h4 class="modal-header-sub-title">Start Your <span class="theme-cl">Filter</span></h4>
            </div>
            <div class="modal-body p-0">
                <div class="filter-header">
                    <ul class="nav nav-tabs" id="filTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="buy-tab" data-bs-toggle="tab" data-bs-target="#buy"
                                type="button" role="tab" aria-controls="buy" aria-selected="true">Buy</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="rent-tab" data-bs-toggle="tab" data-bs-target="#rent"
                                type="button" role="tab" aria-controls="rent"
                                aria-selected="false">Rent</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="sold-tab" data-bs-toggle="tab" data-bs-target="#sold"
                                type="button" role="tab" aria-controls="sold"
                                aria-selected="false">Sold</button>
                        </li>
                    </ul>
                </div>
                <div class="filter-content">
                    <div class="tab-content" id="filTabContent">
                        <div class="tab-pane fade show active" id="buy" role="tabpanel"
                            aria-labelledby="buy-tab">
                            <div class="full-tabs-group">
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Select Property Types</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-1" class="form-check-input" name="a-1"
                                                        type="checkbox">
                                                    <label for="a-1" class="form-check-label">All types</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-2" class="form-check-input" name="a-2"
                                                        type="checkbox">
                                                    <label for="a-2" class="form-check-label">House</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-3" class="form-check-input" name="a-3"
                                                        type="checkbox">
                                                    <label for="a-3" class="form-check-label">Apartment &
                                                        Unit</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-4" class="form-check-input" name="a-4"
                                                        type="checkbox">
                                                    <label for="a-4" class="form-check-label">Townhouse</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-5" class="form-check-input" name="a-5"
                                                        type="checkbox">
                                                    <label for="a-5" class="form-check-label">Villa</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-6" class="form-check-input" name="a-6"
                                                        type="checkbox">
                                                    <label for="a-6" class="form-check-label">Land</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-7" class="form-check-input" name="a-7"
                                                        type="checkbox">
                                                    <label for="a-7" class="form-check-label">Acreage</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-8" class="form-check-input" name="a-8"
                                                        type="checkbox">
                                                    <label for="a-8" class="form-check-label">Rural</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-9" class="form-check-input" name="a-9"
                                                        type="checkbox">
                                                    <label for="a-9" class="form-check-label">Block Of
                                                        Units</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a-10" class="form-check-input" name="a-10"
                                                        type="checkbox">
                                                    <label for="a-10" class="form-check-label">Retirement
                                                        Living</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Choose Price</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Min</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">$50,000</option>
                                                        <option value="2">$75,000</option>
                                                        <option value="3">$1000,000</option>
                                                        <option value="4">$125,000</option>
                                                        <option value="5">$150,000</option>
                                                        <option value="6">$175,000</option>
                                                        <option value="7">$2000,000</option>
                                                        <option value="8">$225,000</option>
                                                        <option value="9">$250,000</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Max</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">$50,000</option>
                                                        <option value="2">$75,000</option>
                                                        <option value="3">$1000,000</option>
                                                        <option value="4">$125,000</option>
                                                        <option value="5">$150,000</option>
                                                        <option value="6">$175,000</option>
                                                        <option value="7">$2000,000</option>
                                                        <option value="8">$225,000</option>
                                                        <option value="9">$250,000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Bedrooms</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Min</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Max</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Bathrooms</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Min</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Max</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Outdoor features</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-1" class="form-check-input" name="s-1"
                                                        type="checkbox">
                                                    <label for="s-1" class="form-check-label">Swimming
                                                        pool</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-2" class="form-check-input" name="s-2"
                                                        type="checkbox">
                                                    <label for="s-2" class="form-check-label">Garage</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-3" class="form-check-input" name="s-3"
                                                        type="checkbox">
                                                    <label for="s-3" class="form-check-label">Balcony</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-4" class="form-check-input" name="s-4"
                                                        type="checkbox">
                                                    <label for="s-4" class="form-check-label">Outdoor
                                                        area</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-5" class="form-check-input" name="s-5"
                                                        type="checkbox">
                                                    <label for="s-5" class="form-check-label">Undercover
                                                        parking</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-6" class="form-check-input" name="s-6"
                                                        type="checkbox">
                                                    <label for="s-6" class="form-check-label">Shed</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-7" class="form-check-input" name="s-7"
                                                        type="checkbox">
                                                    <label for="s-7" class="form-check-label">Fully
                                                        fenced</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-8" class="form-check-input" name="s-8"
                                                        type="checkbox">
                                                    <label for="s-8" class="form-check-label">Outdoor
                                                        spa</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-9" class="form-check-input" name="s-9"
                                                        type="checkbox">
                                                    <label for="s-9" class="form-check-label">Tennis
                                                        court</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s-10" class="form-check-input" name="s-10"
                                                        type="checkbox">
                                                    <label for="s-10" class="form-check-label">Car
                                                        Parking</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Indoor features</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-1" class="form-check-input" name="r-1"
                                                        type="checkbox">
                                                    <label for="r-1" class="form-check-label">Ensuite</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-2" class="form-check-input" name="r-2"
                                                        type="checkbox">
                                                    <label for="r-2" class="form-check-label">Dishwasher</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-3" class="form-check-input" name="r-3"
                                                        type="checkbox">
                                                    <label for="r-3" class="form-check-label">Study</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-4" class="form-check-input" name="r-4"
                                                        type="checkbox">
                                                    <label for="r-4" class="form-check-label">Built in
                                                        robes</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-5" class="form-check-input" name="r-5"
                                                        type="checkbox">
                                                    <label for="r-5" class="form-check-label">Alarm
                                                        system</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-6" class="form-check-input" name="r-6"
                                                        type="checkbox">
                                                    <label for="r-6" class="form-check-label">Broadband</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-7" class="form-check-input" name="r-7"
                                                        type="checkbox">
                                                    <label for="r-7" class="form-check-label">Floorboards</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-8" class="form-check-input" name="r-8"
                                                        type="checkbox">
                                                    <label for="r-8" class="form-check-label">Gym</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-9" class="form-check-input" name="r-9"
                                                        type="checkbox">
                                                    <label for="r-9" class="form-check-label">Rumpus
                                                        room</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r-10" class="form-check-input" name="r-10"
                                                        type="checkbox">
                                                    <label for="r-10" class="form-check-label">Workshop</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Keywords</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="Air con, pool, garage, solar, ensuite...">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                            <div class="full-tabs-group">
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Select Property Types</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-1" class="form-check-input" name="a1-1"
                                                        type="checkbox">
                                                    <label for="a1-1" class="form-check-label">All types</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-2" class="form-check-input" name="a1-2"
                                                        type="checkbox">
                                                    <label for="a1-2" class="form-check-label">House</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-3" class="form-check-input" name="a1-3"
                                                        type="checkbox">
                                                    <label for="a1-3" class="form-check-label">Apartment &
                                                        Unit</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-4" class="form-check-input" name="a1-4"
                                                        type="checkbox">
                                                    <label for="a1-4" class="form-check-label">Townhouse</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-5" class="form-check-input" name="a1-5"
                                                        type="checkbox">
                                                    <label for="a1-5" class="form-check-label">Villa</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-6" class="form-check-input" name="a1-6"
                                                        type="checkbox">
                                                    <label for="a1-6" class="form-check-label">Land</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-7" class="form-check-input" name="a1-7"
                                                        type="checkbox">
                                                    <label for="a1-7" class="form-check-label">Acreage</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-8" class="form-check-input" name="a1-8"
                                                        type="checkbox">
                                                    <label for="a1-8" class="form-check-label">Rural</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-9" class="form-check-input" name="a1-9"
                                                        type="checkbox">
                                                    <label for="a1-9" class="form-check-label">Block Of
                                                        Units</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a1-10" class="form-check-input" name="a1-10"
                                                        type="checkbox">
                                                    <label for="a1-10" class="form-check-label">Retirement
                                                        Living</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Choose Price</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Min</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">$50,000</option>
                                                        <option value="2">$75,000</option>
                                                        <option value="3">$1000,000</option>
                                                        <option value="4">$125,000</option>
                                                        <option value="5">$150,000</option>
                                                        <option value="6">$175,000</option>
                                                        <option value="7">$2000,000</option>
                                                        <option value="8">$225,000</option>
                                                        <option value="9">$250,000</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Max</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">$50,000</option>
                                                        <option value="2">$75,000</option>
                                                        <option value="3">$1000,000</option>
                                                        <option value="4">$125,000</option>
                                                        <option value="5">$150,000</option>
                                                        <option value="6">$175,000</option>
                                                        <option value="7">$2000,000</option>
                                                        <option value="8">$225,000</option>
                                                        <option value="9">$250,000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Bedrooms</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Min</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Max</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Bathrooms</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Min</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Max</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Outdoor features</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-1" class="form-check-input" name="s1-1"
                                                        type="checkbox">
                                                    <label for="s1-1" class="form-check-label">Swimming
                                                        pool</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-2" class="form-check-input" name="s1-2"
                                                        type="checkbox">
                                                    <label for="s1-2" class="form-check-label">Garage</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-3" class="form-check-input" name="s1-3"
                                                        type="checkbox">
                                                    <label for="s1-3" class="form-check-label">Balcony</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-4" class="form-check-input" name="s1-4"
                                                        type="checkbox">
                                                    <label for="s1-4" class="form-check-label">Outdoor
                                                        area</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-5" class="form-check-input" name="s1-5"
                                                        type="checkbox">
                                                    <label for="s1-5" class="form-check-label">Undercover
                                                        parking</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-6" class="form-check-input" name="s1-6"
                                                        type="checkbox">
                                                    <label for="s1-6" class="form-check-label">Shed</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-7" class="form-check-input" name="s1-7"
                                                        type="checkbox">
                                                    <label for="s1-7" class="form-check-label">Fully
                                                        fenced</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-8" class="form-check-input" name="s1-8"
                                                        type="checkbox">
                                                    <label for="s1-8" class="form-check-label">Outdoor
                                                        spa</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-9" class="form-check-input" name="s1-9"
                                                        type="checkbox">
                                                    <label for="s1-9" class="form-check-label">Tennis
                                                        court</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s1-10" class="form-check-input" name="s1-10"
                                                        type="checkbox">
                                                    <label for="s1-10" class="form-check-label">Car
                                                        Parking</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Indoor features</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-1" class="form-check-input" name="r1-1"
                                                        type="checkbox">
                                                    <label for="r1-1" class="form-check-label">Ensuite</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-2" class="form-check-input" name="r1-2"
                                                        type="checkbox">
                                                    <label for="r1-2" class="form-check-label">Dishwasher</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-3" class="form-check-input" name="r1-3"
                                                        type="checkbox">
                                                    <label for="r1-3" class="form-check-label">Study</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-4" class="form-check-input" name="r1-4"
                                                        type="checkbox">
                                                    <label for="r1-4" class="form-check-label">Built in
                                                        robes</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-5" class="form-check-input" name="r1-5"
                                                        type="checkbox">
                                                    <label for="r1-5" class="form-check-label">Alarm
                                                        system</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-6" class="form-check-input" name="r1-6"
                                                        type="checkbox">
                                                    <label for="r1-6" class="form-check-label">Broadband</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-7" class="form-check-input" name="r1-7"
                                                        type="checkbox">
                                                    <label for="r1-7" class="form-check-label">Floorboards</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-8" class="form-check-input" name="r1-8"
                                                        type="checkbox">
                                                    <label for="r1-8" class="form-check-label">Gym</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-9" class="form-check-input" name="r1-9"
                                                        type="checkbox">
                                                    <label for="r1-9" class="form-check-label">Rumpus
                                                        room</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r1-10" class="form-check-input" name="r1-10"
                                                        type="checkbox">
                                                    <label for="r1-10" class="form-check-label">Workshop</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Keywords</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="Air con, pool, garage, solar, ensuite...">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="sold" role="tabpanel" aria-labelledby="sold-tab">
                            <div class="full-tabs-group">
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Select Property Types</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-1" class="form-check-input" name="a2-1"
                                                        type="checkbox">
                                                    <label for="a2-1" class="form-check-label">All types</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-2" class="form-check-input" name="a2-2"
                                                        type="checkbox">
                                                    <label for="a2-2" class="form-check-label">House</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-3" class="form-check-input" name="a2-3"
                                                        type="checkbox">
                                                    <label for="a2-3" class="form-check-label">Apartment &
                                                        Unit</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-4" class="form-check-input" name="a2-4"
                                                        type="checkbox">
                                                    <label for="a2-4" class="form-check-label">Townhouse</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-5" class="form-check-input" name="a2-5"
                                                        type="checkbox">
                                                    <label for="a2-5" class="form-check-label">Villa</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-6" class="form-check-input" name="a2-6"
                                                        type="checkbox">
                                                    <label for="a2-6" class="form-check-label">Land</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-7" class="form-check-input" name="a2-7"
                                                        type="checkbox">
                                                    <label for="a2-7" class="form-check-label">Acreage</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-8" class="form-check-input" name="a2-8"
                                                        type="checkbox">
                                                    <label for="a2-8" class="form-check-label">Rural</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-9" class="form-check-input" name="a2-9"
                                                        type="checkbox">
                                                    <label for="a2-9" class="form-check-label">Block Of
                                                        Units</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="a2-10" class="form-check-input" name="a2-10"
                                                        type="checkbox">
                                                    <label for="a2-10" class="form-check-label">Retirement
                                                        Living</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Choose Price</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Min</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">$50,000</option>
                                                        <option value="2">$75,000</option>
                                                        <option value="3">$1000,000</option>
                                                        <option value="4">$125,000</option>
                                                        <option value="5">$150,000</option>
                                                        <option value="6">$175,000</option>
                                                        <option value="7">$2000,000</option>
                                                        <option value="8">$225,000</option>
                                                        <option value="9">$250,000</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Max</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">$50,000</option>
                                                        <option value="2">$75,000</option>
                                                        <option value="3">$1000,000</option>
                                                        <option value="4">$125,000</option>
                                                        <option value="5">$150,000</option>
                                                        <option value="6">$175,000</option>
                                                        <option value="7">$2000,000</option>
                                                        <option value="8">$225,000</option>
                                                        <option value="9">$250,000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Bedrooms</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Min</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Max</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Bathrooms</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Min</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Max</label>
                                                    <select class="select-normal">
                                                        <option value="0">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Outdoor features</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-1" class="form-check-input" name="s2-1"
                                                        type="checkbox">
                                                    <label for="s2-1" class="form-check-label">Swimming
                                                        pool</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-2" class="form-check-input" name="s2-2"
                                                        type="checkbox">
                                                    <label for="s2-2" class="form-check-label">Garage</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-3" class="form-check-input" name="s2-3"
                                                        type="checkbox">
                                                    <label for="s2-3" class="form-check-label">Balcony</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-4" class="form-check-input" name="s2-4"
                                                        type="checkbox">
                                                    <label for="s2-4" class="form-check-label">Outdoor
                                                        area</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-5" class="form-check-input" name="s2-5"
                                                        type="checkbox">
                                                    <label for="s2-5" class="form-check-label">Undercover
                                                        parking</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-6" class="form-check-input" name="s2-6"
                                                        type="checkbox">
                                                    <label for="s2-6" class="form-check-label">Shed</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-7" class="form-check-input" name="s2-7"
                                                        type="checkbox">
                                                    <label for="s2-7" class="form-check-label">Fully
                                                        fenced</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-8" class="form-check-input" name="s2-8"
                                                        type="checkbox">
                                                    <label for="s2-8" class="form-check-label">Outdoor
                                                        spa</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-9" class="form-check-input" name="s2-9"
                                                        type="checkbox">
                                                    <label for="s2-9" class="form-check-label">Tennis
                                                        court</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="s2-10" class="form-check-input" name="s2-10"
                                                        type="checkbox">
                                                    <label for="s2-10" class="form-check-label">Car
                                                        Parking</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Indoor features</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <ul class="row p-0 m-0">
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-1" class="form-check-input" name="r2-1"
                                                        type="checkbox">
                                                    <label for="r2-1" class="form-check-label">Ensuite</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-2" class="form-check-input" name="r2-2"
                                                        type="checkbox">
                                                    <label for="r2-2"
                                                        class="form-check-label">Dishwasher</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-3" class="form-check-input" name="r2-3"
                                                        type="checkbox">
                                                    <label for="r2-3" class="form-check-label">Study</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-4" class="form-check-input" name="r2-4"
                                                        type="checkbox">
                                                    <label for="r2-4" class="form-check-label">Built in
                                                        robes</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-5" class="form-check-input" name="r2-5"
                                                        type="checkbox">
                                                    <label for="r2-5" class="form-check-label">Alarm
                                                        system</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-6" class="form-check-input" name="r2-6"
                                                        type="checkbox">
                                                    <label for="r2-6" class="form-check-label">Broadband</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-7" class="form-check-input" name="r2-7"
                                                        type="checkbox">
                                                    <label for="r2-7"
                                                        class="form-check-label">Floorboards</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-8" class="form-check-input" name="r2-8"
                                                        type="checkbox">
                                                    <label for="r2-8" class="form-check-label">Gym</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-9" class="form-check-input" name="r2-9"
                                                        type="checkbox">
                                                    <label for="r2-9" class="form-check-label">Rumpus
                                                        room</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 p-0">
                                                <div class="form-check form-check-inline">
                                                    <input id="r2-10" class="form-check-input" name="r2-10"
                                                        type="checkbox">
                                                    <label for="r2-10" class="form-check-label">Workshop</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-tabs-group">
                                    <div class="single-tabs-group-header">
                                        <h5>Keywords</h5>
                                    </div>

                                    <div class="single-tabs-group-content">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="Air con, pool, garage, solar, ensuite...">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="filt-buttons-updates">
                    <button type="button" class="btn btn-dark">Clear Filter</button>
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
|--------------------------------------------------------------------------
| Filter Modal Starts
|--------------------------------------------------------------------------
-->
