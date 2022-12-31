<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Peer to Peer Wallet</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body class="antialiased">
        <section class="header" id="a">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-menu">
                            <li><a href="#a">Home <i class="fas fa-angle-down angle"></i></a>
                                <ul class="drop-down">
                                    <li><a href="#g">Home One</a></li>
                                    <li><a href="#h">Home Two</a></li>
                                    <li><a href="#i">Home Three</a></li>
                                </ul>
                            </li>
                            <li><a href="#b">Pages <i class="fa-solid fa-angle-down angle"></i></i></a>
                                <ul class="drop-down">
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Apply Now</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Projects <i class="fas fa-angle-down angle2"></i></a>
                                        <ul class="drop-down2">
                                            <li><a href="#j">Project</a></li>
                                            <li><a href="#k">Projects Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Terms & Condition</a></li>
                                    <li><a href="#">Privacy & Policy</a></li>
                                    <li><a href="#">Error Page</a></li>
                                </ul>
                            </li>
                            <li><a href="#c">Services <i class="fas fa-angle-down angle"></i></a>
                                <ul class="drop-down">
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">Services Details</a></li>
                                </ul>
                            </li>
							<li><a href="#g">Contact</a></li>
							@if (Route::has('login'))
								<div class="hidden">
									@auth
										<li>
											<a href="{{ url('/dashboard') }}"
											class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
										</li>
									@else
										<li>
											<a href="{{ route('login') }}">Log in</a>
										</li>
										@if (Route::has('register'))
											<li>
												<a href="{{ route('register') }}">Register</a>
											</li>
										@endif
									@endauth
								</div>
							@endif
                        </ul>
                        <div class="header-info d-flex align-items-center">
                            <div class="header-search">
                                <span class="search"><i class="fas fa-search"></i></span>
                            </div>
                            <div class="header-call clearfix">
                                <div class="float-left mr-4 h-100">
                                    <span class="call-icon">
                                        <i class="fas fa-phone-volume phone"></i>
                                    </span>
                                </div>
                                <div class="call-info mr-3">
                                    <span class="d-block" style="color: #787878; font-size:1.4rem;">Call Now</span>
                                    <a class="d-block tel" href="tel:+8801537500950">+ (880) 1537-500950</a>
                                </div>
                            </div>
                            <div class="header-btn">
                                <a class="btn btn-danger" href="https://devnajib.netlify.app/">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </section>
        <section class="banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner">
                            <h5>Your money is secure</h5>
                            <h1>Banking System with Peer to Peer Wallet</h1>
                            <p>Don't hesitate to use our service.</p>
                            <span class="rps-3">
                                <a class="btn btn-danger fs animation-d" href="https://devnajib.netlify.app/">View More</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>
