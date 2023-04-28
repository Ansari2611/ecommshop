<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<div class="header_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="logo"><a href="#"><img src="user/images/logo.png"></a></div>
            </div>
            <div class="col-sm-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                       <a class="nav-item nav-link" href="{{route('home')}}">Home</a>
                       
                       
               
                       {{-- <a class="nav-item nav-link" href="{{route('contact')}}">Contact</a> --}}

                       {{-- <a class="nav-item nav-link" href="{{route('showwallet')}}">
                        <i class='fas fa-wallet'></i>
                        Wallet</a> --}}


                        <div class="dropdown navbar-nav  collapse navbar-collapse mb-3" id="navbarNavAltMarkup">
                            <a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="{{route('showwallet')}}">
                                <i class='fas fa-wallet'></i>
                                Wallet</a>
                              <a class="dropdown-item" href="{{route('myorders')}}">
                                <i class='fas fa-shopping-bag'></i>
                                My Orders</a>
                              <a class="dropdown-item" href="{{route('about')}}">
                                <i class="fa fa-address-card"></i>
                                About</a>

                              <a class="dropdown-item" href="{{route('contact')}}">
                                <i class='fas fa-address-book'></i>
                                Contact</a>
                              
                            </div>
                          </div>

                       
                       <a class="nav-item nav-link" href="{{route('showcart')}}">
                        <i class="fas fa-shopping-cart"></i>
                        Cart[{{$cartCount}}]</a>

                        <a class="nav-item nav-link" href="#">
                        <i class='fas fa-map-marker-alt'></i>
                        
                        @if ($currentinfo)
                        {{$currentinfo->regionName}},
                        {{$currentinfo->countryName}}
                            
                        @endif</a>
                       

                       @if (Route::has('login'))
                    
                           @auth
                           <x-app-layout>
                           </x-app-layout>
                           @else
                               <a class="nav-item nav-link" href="{{ route('login') }}" >Log in</a>
       
                               @if (Route::has('register'))
                                   <a class="nav-item nav-link" href="{{ route('register') }}" >Register</a>
                               @endif
                           @endauth
                      
                   @endif
                      
                    </div>
                </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="banner_section">
        <div class="container-fluid">
            <section class="slide-wrapper">
<div class="container-fluid">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                <div class="col-sm-2 padding_0">
                    <p class="mens_taital">Men Shoes</p>
                    <div class="page_no">0/2</div>
                    <p class="mens_taital_2">Men Shoes</p>
                </div>
                <div class="col-sm-5">
                    <div class="banner_taital">
                        <h1 class="banner_text">New Branded Shoes </h1>
                        <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                        <p class="lorem_text">Shop now to update your shoe collection with our latest arrivals!.</p>
                        <button class="buy_bt">Buy Now</button>
                        <button class="more_bt">See More</button>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shoes_img"><img src="user/images/shoes2.png"></div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                <div class="col-sm-2 padding_0">
                    <p class="mens_taital">Men Shoes</p>
                    <div class="page_no">0/2</div>
                    <p class="mens_taital_2">Men Shoes</p>
                </div>
                <div class="col-sm-5">
                    <div class="banner_taital">
                        <h1 class="banner_text">New Running Shoes </h1>
                        <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                        <p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <button class="buy_bt">Buy Now</button>
                        <button class="more_bt">See More</button>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shoes_img"><img src="user/images/running-shoes.png"></div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                <div class="col-sm-2 padding_0">
                    <p class="mens_taital">Men Shoes</p>
                    <div class="page_no">0/2</div>
                    <p class="mens_taital_2">Men Shoes</p>
                </div>
                <div class="col-sm-5">
                    <div class="banner_taital">
                        <h1 class="banner_text">New Running Shoes </h1>
                        <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                        <p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <button class="buy_bt">Buy Now</button>
                        <button class="more_bt">See More</button>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shoes_img"><img src="user/images/running-shoes.png"></div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                <div class="col-sm-2 padding_0">
                    <p class="mens_taital">Men Shoes</p>
                    <div class="page_no">0/2</div>
                    <p class="mens_taital_2">Men Shoes</p>
                </div>
                <div class="col-sm-5">
                    <div class="banner_taital">
                        <h1 class="banner_text">New Running Shoes </h1>
                        <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                        <p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <button class="buy_bt">Buy Now</button>
                        <button class="more_bt">See More</button>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shoes_img"><img src="user/images/running-shoes.png"></div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</section>			
        </div>
    </div>
</div>