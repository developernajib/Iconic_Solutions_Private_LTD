<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Peer to Peer Wallet System</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<style>
	    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');

    header {
    
        background-color: #fff;
    }
    
    li {
    
        list-style: none;
    
        font-weight: 500;
    
        font-size: 20px;
    
    }
    
    a {
    
        color: #000;
    
        text-decoration: none;
    
    }
    
    ul li a.active {
    
        color: #000;
    
    }
    
    .navbar {
    
        margin: 0 auto;
    
        max-width: 1249px;
    
        min-height: 70px;
    
        display: flex;
    
        justify-content: space-between;
    
        align-items: center;
    
        padding: 0 24px;
    
    }
    
    .nav-list {
    
        display: flex;
    
        align-items: center;
    
    
    }
    ul{
        margin-top: 1rem;
    }
    
    .logo {
    
        font-size: 2rem;
    
    }
    
    .nav-link {
    
        transition: 0.7s ease;
    
    }
    
    .nav-link:hover {
    
        color: #555555;
    
    }
    
    .hamburger {
    
        display: none;
    
        cursor: pointer;
    
    }
    
    .bar {
    
        display: block;
    
        width: 25px;
    
        height: 3px;
    
        margin: 5px auto;
    
        -webkit-transition: all 0.3s ease-in-out;
    
        transition: all 0.3s ease-in-out;
    
        background-color: #000;
    
    }

    @media (max-width:768px) {
    
        .navbar {
    
            width: 100%;
    
        }
    
        .hamburger {
    
            display: block;
    
        }
    
        .hamburger.active .bar:nth-child(2) {
    
            opacity: 0;
    
        }
    
        .hamburger.active .bar:nth-child(1) {
    
            transform: translateY(8px) rotate(45deg);

        }
    
        .hamburger.active .bar:nth-child(3) {
    
            transform: translateY(-8px) rotate(-45deg);
    
        }
    
        .nav-list {
    
            position: fixed;
    
            left: -100%;
    
            top: 70px;
    
            gap: 0;
    
            flex-direction: column;
    
            background-color: #fff;
    
            width: 100%;
    
            text-align: center;
    
            transition: 0.3s;
    
        }
    
        .nav-item {
    
            margin: 25px 0;
    
        }
    
        .nav-list.active {
    
            left: 0;
    
        }
    
    }
	</style>

</head>

<body class="antialiased">
    <section class="header" id="a">
        <header>
        
            <nav class="navbar">
        
                <a class="logo" href="#">P2P Wallet</a>
        
                <ul class="nav-list">
        
                    <li class="nav-item">
        
                        <a class="nav-link active" href="#">Home</a>
        
                    </li>
        
                    <li class="nav-item">
        
                        <a class="nav-link" href="#">About</a>
        
                    </li>
        
        
                    <li class="nav-item">
        
                        <a class="nav-link" href="#">Contact</a>
        
                    </li>
                    @if (Route::has('login'))
								@auth
								<li class="nav-item">
        
                                    <a href="{{ url('/dashboard') }}"
										 class="nav-link" >Dashboard</a>
        
                                </li>
								@else
									<li class="nav-item">
										<a  class="nav-link"  href="{{ route('login') }}">Log in</a>
									</li>
									@if (Route::has('register'))
										<li class="nav-item">
											<a  class="nav-link"  href="{{ route('register') }}">Register</a>
										</li>
									@endif
								@endauth
						@endif
        
                </ul>
        
                <div class="hamburger">
        
                    <span class="bar"></span>
        
                    <span class="bar"></span>
        
                    <span class="bar"></span>
        
                </div>
        
            </nav>
        
        </header>

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
        <script>
            const hamburger = document.querySelector('.hamburger');

            const navList = document.querySelector('.nav-list');
            
            hamburger.addEventListener('click', function(){
            
                hamburger.classList.toggle('active')
            
                navList.classList.toggle('active')
            
            })
            
            document.querySelectorAll('.nav-link').forEach(n => n.addEventListener('click', () =>{
            
                hamburger.classList.remove('active')
            
                navList.classList.remove('active')
            
            }))
        </script>
</body>

</html>
