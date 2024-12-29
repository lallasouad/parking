<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
       
    <title>Laravel</title>
    <style>
        /* Assuming you're using Tailwind CSS */
.text-3xl {
    font-size: 1.875rem; /* 30px for desktop */
}

.text-lg {
    font-size: 1.125rem; /* 18px for desktop */
}

@media (min-width: 768px) {
    .text-3xl {
        font-size: 2.5rem; /* 40px for larger screens */
    }

    .text-lg {
        font-size: 1.25rem; /* 20px for larger screens */
    }
}

            .background{
        background-image: url('park.jpg');
        background-size: cover; 
        width: 100%;
        height: 110vh;
        position: absolute; 
        background-size: cover; 
        background-position: center; 
        z-index: -1;
        filter: blur(5px);
            }
            .hero {
            background-image: url("bg.jpg");
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
        }
        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.3); /* Adjust the opacity as needed */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }

    </style>

    </head>
    <body >
    <div class="background"></div>

    @if (Route::has('login'))
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="favicon.png" alt="Park" class="d-inline-block align-text-top" style="height: 32px; margin-bottom:12px;">
            <span class="ml-4 mb-1 font-weight-bold fs-3  text-primary dark:text-white">ParkEase</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about-section">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review-section">Pricing</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#footer-section">Contact</a>
                    </li>
                    @auth
                    <li>
                        <a href="{{ url('/dashboard') }}" class="text-lg font-bold">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @endif

    <section class="hero d-flex align-items-center justify-content-center vh-100">
        <div class="hero-overlay"></div>
        <div class="container text-center hero-content">
            <h1 class="display-4 font-weight-bold mb-4">Welcome to parkEase</h1>
            <p class="lead mb-4">Discover our amazing service</p>

        </div>
    </section>

    <section  id="about-section" class="py-8 px-4  bg-white dark:bg-secondary" style="padding-top: 20px; padding-bottom: 20px;">
    <div  class="container d-flex flex-column flex-md-row  text-dark dark:text-light w-100 p-3"  style=" margin-top: 25px; padding-right:50px; margin-left: 35px;padding-top:10px; border-radius:7px ;">
        <div class="w-50 w-md-50 my-10 d-flex align-items-center justify-content-center">
            <img src="pricing-bg.jpg" alt="carpic" class="rounded float-left" style="max-width: 600px;">
        </div>
        <div  class="w-100 w-md-50 d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-3xl font-bold mb-4 text-center md:text-left" style="margin-top: 0px;">About Us</h1>
            <p class="text-lg text-center md:text-left px-4"style="margin-left: 5px;">

Finding parking doesn't have to be stressful anymore. Introducing ParkEase, the ultimate app designed to simplify your parking experience wherever you go. Whether you're commuting to work, exploring a new city, or running errands, ParkEase is your trusted partner in finding and managing parking spaces effortlessly.
            </p>
        </div>
    </div>
</section>


    <section id="review-section" class="py-8 px-4 bg-white dark:bg-secondary">
        <h2 class="text-2xl text-center text-dark dark:text-light">Pricing</h2>
        <div class="row mt-4">
            <div class="col-md-4 mb-4">
                <div class="bg-light dark:bg-dark p-4 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-dark dark:text-light">Basic</h3>
                    <p class="text-lg text-secondary dark:text-light">$10/month</p>
                    <p class="text-secondary dark:text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque consequatur veniam quisquam officiis esse eligendi fuga magnam aut corporis fugiat sapiente, et, aspernatur, dicta autem suscipit. Odit commodi maiores aspernatur?</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="bg-light dark:bg-dark p-4 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-dark dark:text-light">Standard</h3>
                    <p class="text-lg text-secondary dark:text-light">$20/month</p>
                    <p class="text-secondary dark:text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque consequatur veniam quisquam officiis esse eligendi fuga magnam aut corporis fugiat sapiente, et, aspernatur, dicta autem suscipit. Odit commodi maiores aspernatur?</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="bg-light dark:bg-dark p-4 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-dark dark:text-light">Standard</h3>
                    <p class="text-lg text-secondary dark:text-light">$20/month</p>
                    <p class="text-secondary dark:text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque consequatur veniam quisquam officiis esse eligendi fuga magnam aut corporis fugiat sapiente, et, aspernatur, dicta autem suscipit. Odit commodi maiores aspernatur?</p>
                </div>
            </div>

    </body>
    <footer  class="ftco-footer ftco-bg-dark ftco-section" style="margin-top: 5px; background-color:#007bff; padding-right:25px; margin-left: 15px;padding-top:10px; border-radius:7px ;">
    <div  id="footer-section" class="container">
      <div class="info_top ">
        <div class="row ">
          <div class="col-md-6 col-lg-3 info_col">
            <div class="info_form">
              <h4 style="color: white;">
                Stay Connected
              </h4>
              <form action="">
                <input style="  border-radius: 7px;width: 189px;"type="text" placeholder="Enter Your Email" />
                <button type="submit"  style=" width: 189px;margin-top: 5px;background-color:#a2b9bc; color: white; border-radius: 7px;">
                  Subscribe
                </button>
              </form>
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 info_col ">
            <div class="info_detail">
              <h4 style="color: white;">
                About Us
              </h4>
              <p style="color: white;">
                Necessitatibus, culpa, totam quod neque cum officiis odio, excepturi magnam incidunt voluptates sed voluptate id expedita sint! Cum veritatis iusto molestiae reiciendis deserunt vel odio incidunt, tenetur itaque. Ullam, iste!
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 info_col ">
            <div class="info_detail">
              <h4 style="color: white;">
                Online Booking
              </h4>
              <p style="color: white;">
               Our app offers you a user friendly interface that allows to book easily
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 info_col" style="color: white;">
            <h4>
              Contact us
            </h4>
            <p style="color: white;">
              Lorem ipsum dolor sit amet consectetur adipisicing elit
            </p>
            <div class="contact_nav">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span style="color: white;">
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span style="color: white;">
                  Call : +01 123455678990
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span style="color: white;">
                  Email : demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </footer>

</html>
