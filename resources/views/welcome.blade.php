{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Financial Guardians</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/fmslogo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/fmslogo.png') }}" rel="apple-touch-icon">
  <script src="https://www.google.com/recaptcha/api.js?render={{config('services.recap.site_key')}}"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style1.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <a href="/" class="logo me-auto"><img src="{{ asset('assets/img/fmslogo.png') }}" alt="" class="img-fluid">Financial Guardian</a>
      <!-- <h1 class="logo me-auto"><a href="/">Financial Guardian</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#faq">Faqs</a></li>
          <li><a class="getstarted scrollto" href="{{ route('loadlogin') }}">Login</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Were your actions pays off.</h1>
          <h2>We are team of Talented BSIT Student Programmers </h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
                Building upon the knowledge and skills acquired throughout their academic journey, students apply theoretical concepts, research methodologies, and analytical tools to address real-world problems or explore cutting-edge areas of inquiry. This practical application of knowledge helps students bridge the gap between theory and practice, preparing them for future career endeavors.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Learning is a lifelong journey, and our team is committed to staying at the forefront of technology. </li>
              <li><i class="ri-check-double-line"></i> Collaboration is at the heart of our team's success. </li>
              <li><i cla    ss="ri-check-double-line"></i> Our team comprises highly skilled programmers proficient in a wide range of programming languages, frameworks, and technologies.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
                Great programmers are not just adept at writing code; they are also creative problem-solvers. Our team thrives on challenges, approaching complex problems with curiosity, resourcefulness, and out-of-the-box thinking. We embrace new ideas, explore innovative solutions, and push the boundaries of what's possible in software development.         </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content text-center">
              <h3>
                "Empowering Financial Freedom: Our Mission" <strong class="text-center" > <br>Our mission encompasses several key principles</strong></h3>
              <p>
                At our core, we are driven by a singular mission: to empower individuals and businesses with the knowledge, tools, and resources needed to achieve financial freedom. We believe that financial freedom is not merely about accumulating wealth, but rather about enabling people to live life on their own terms, unencumbered by financial stress or limitations.              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Education <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                        We are committed to providing accessible and comprehensive financial education to individuals at every stage of their financial journey. From basic budgeting and saving strategies to advanced investment techniques, we strive to equip our community with the knowledge and skills necessary to make informed financial decisions.                  </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Empowerment <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                        We seek to empower individuals to take control of their financial futures. Through personalized guidance, practical advice, and innovative tools, we enable our clients to set and achieve meaningful financial goals, whether it's buying a home, starting a business, or retiring comfortably.                  </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Inclusion <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                        We believe that everyone deserves access to quality financial services and resources, regardless of their background or circumstances. We are dedicated to fostering an inclusive environment where individuals from all walks of life feel welcome and supported on their path to financial success.                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{ asset('assets/img/why-us.png') }}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('assets/img/skills.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Programming Languages</h3>
            <p class="fst-italic">
                "Exploring the World of Code: A Look into Programming Languages"         </p>

            <div class="skills-content">
                <div class="progress">
                    <span class="skill">Blade <i class="val">50.7%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" style="width: 50.7%;" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="progress">
                    <span class="skill">PHP <i class="val">30.2%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" style="width: 30.2%;" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="progress">
                    <span class="skill">CSS <i class="val">14.9%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" style="width: 14.9%;" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="progress">
                    <span class="skill">JavaScript <i class="val">4.2%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" style="width: 4.2%;" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>


            </div>

          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Financial Guardians</h3>
            <p> "Money is only a tool. It will take you wherever you wish, but it will not replace you as the driver." - Ayn Rand</p>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->

  <!-- ======= Team Section ======= -->
<!--<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Team</h2>
        <p>Embracing agile methodologies, we prioritize adaptability and responsiveness in our work. We value iterative development, regularly delivering working software and quickly adjusting to changing requirements.</p>
      </div>

      <div class="row">

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Mark Luis</h4>
              <span>Programmer</span>
              <p>As I embark on this exciting journey through the digital landscape, I look forward to facing new challenges, forging meaningful connections.</p>
              <div class="social">
                <a href="https://github.com/BonifaceMARK"><i class="bi bi-github"></i></a>
                <a href="https://web.facebook.com/markluis.bonifacio.31/"><i class="ri-facebook-fill"></i></a>
                <a href="https://www.instagram.com/rinkashime_cb/?fbclid=IwAR2pmDlHS9fgLg9mb4dTZDh8pTK8P36UXscDJaNMUdcj0F_IvXaKYY12bJk"><i class="ri-instagram-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Kayla Suarez Campana</h4>
              <span>Team Leader</span>
              <p>"Leadership is the capacity to translate vision into reality." - Warren Bennis</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Mathew Laxamana</h4>
              <span>System Analyst</span>
              <p>"System analysts are the architects of innovation, transforming complexity into clarity and paving the way for progress."</p>
              <div class="social">
                <a href="https://github.com/Bootloader1z"><i class="bi bi-github"></i></a>
                <a href="https://web.facebook.com/Bootloader1zx"><i class="ri-facebook-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>John Paul Rosales</h4>
              <span>Network Analyst</span>
              <p>"As a network analyst, you're not just troubleshooting connections; you're building bridges between systems and fostering seamless communication."</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Princess Gem Recopuerto</h4>
              <span>Document Analyst</span>
              <p>"As a document analyst, you're not just reading words; you're uncovering stories, insights, and hidden truths."</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>--><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>We value your input. If you don't find the answer you're looking for in our FAQs, please don't hesitate to reach out to us. Your feedback helps us improve our FAQ section and better serve your needs.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">What is personal finance?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                    Personal finance refers to the management of an individual's financial activities, including budgeting, saving, investing, and planning for future expenses and goals.           </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">How can I create a budget?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Start by listing your income sources and fixed expenses, then allocate funds for variable expenses and savings goals. Regularly track your spending to ensure you stay within your budget.

                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">What are the different types of investment options available? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Common investment options include stocks, bonds, mutual funds, real estate, and retirement accounts like 401(k)s and IRAs. Each option carries its own risk and return profile.          </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">What are the benefits of financial planning?
                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Financial planning helps individuals set and achieve their short-term and long-term financial goals. It provides clarity on current financial status, identifies areas for improvement, and offers strategies to maximize wealth accumulation.            </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">How can I protect myself from identity theft and fraud? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Safeguard personal information, regularly monitor financial accounts for unauthorized activity, and use strong, unique passwords for online accounts. Consider enrolling in identity theft protection services and freeze credit reports to prevent unauthorized access.          </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Financial Guardian</h3>
            <p>
                #1071 Brgy. Kaligayahan,<br>
                Quirino Highway<br>
                Novaliches Quezon City,  <br>
                Philippines<br>
              <strong>Phone:</strong> 417-4355<br>
              <strong>Email:</strong> bcp-inquiry@bcp.edu.ph<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-check-circle"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-check-circle"></i> <a href="#">Web Development</a></li>
              <li> <i class="bi bi-check-circle"></i><a href="#">Product Management</a></li>
              <li><i class="bi bi-check-circle"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-check-circle"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Engage with Us on Social Media: Stay Connected, Stay Informed</p>
            <div class="social-links mt-3">
              <a href="https://web.facebook.com/bcpofficialpage/?_rdc=1&_rdr" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/explore/locations/442175485/bestlink-college-of-the-philippines-mv-campus/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://bcp.edu.ph/" class="google-plus"><i class="bi bi-house"></i></i></a>
              <a href="https://www.linkedin.com/school/bestlink-college-of-the-philippines" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Financial Guardian</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layouts/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main1.js') }}"></script>

</body>

</html> --}}





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Financial Management System - Secure Financial Guardian Platform</title>
  <meta content="A comprehensive financial management system designed to safeguard and manage your financial assets securely." name="description">
  <meta content="financial guardian system, financial management, asset management, finance, security" name="keywords">



  <link href="{{ URL('assets/img/subhead.png')}}" rel="icon">
  <link href="mainpage/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="mainpage/vendor/aos/aos.css" rel="stylesheet">
  <link href="mainpage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="mainpage/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="mainpage/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="mainpage/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="mainpage/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="mainpage/css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="#" onclick="reloadPage()"><img src="{{ URL('assets/img/subhead.png')}}"  alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#features">App Features</a></li>
          <li class="dropdown">
            <a><span>Portal</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @if (Route::has('login'))
              @auth
              @if (Auth::user()->role == '0')
              <li><a class="dropdown-item" href="{{ route('loadlogin') }}">Login</a></li>
              {{-- @elseif ( Auth::user()->usertype == '2' )
              <li><a class="dropdown-item" href="{{ url('/manager/home') }}">Home</a></li>
              @elseif ( Auth::user()->usertype == '3' )
              <li><a class="dropdown-item" href="{{ url('/customer/home') }}">Home</a></li> --}}
              @endif
              <li><hr class="dropdown-divider" /></li>
              @else

              <li><a class="dropdown-item" href="{{ route('loadlogin') }}">Login</a></li>
              @if (Route::has('register'))
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
              @endif
              @endauth
              @endif
            </ul>
          </li>
          <li><a class="getstarted scrollto" href="#features">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>


    </div>
  </header>


  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
            <h1>Financial Management</h1>
            <h2 style="font-size: 14.5px">the ultimate solution for streamlined financial control and success. Elevate your organization's financial health with our comprehensive platform designed for efficiency and precision.</h2>
            <a href="https://play.google.com/store/apps?hl=en&gl=PH" class="download-btn"><i class="bx bxl-play-store"></i> Google Play</a>
            <a href="https://www.apple.com/ph/app-store/" class="download-btn"><i class="bx bxl-apple"></i> App Store</a>
          </div>
        </div>
        <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
          <img src="mainpage/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section>

  <main id="main">

    <section id="features" class="features">
      <div class="container">

        <div class="section-title">
          <h2>App Features</h2>
          <p>Expense management becomes a breeze, whether you're an individual or part of a team. Streamline the tracking of expenses, optimize spending, and effortlessly categorize receipts. Sync transactions, payments, and milestones seamlessly with our integrated financial calendar, ensuring you never miss a deadline or an important financial event.</p>
        </div>

        <div class="row no-gutters">
          <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up">
                  <i class="bx bx-receipt"></i>
                  <h4>Real-time Financial Insights</h4>
                  <p>Gain instant access to accurate and up-to-date financial data, empowering informed decision-making.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Integrated Budgeting</h4>
                  <p>Plan and forecast effectively with seamless budgeting tools for every department and project.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-images"></i>
                  <h4>Customizable Reporting</h4>
                  <p>Generate tailored financial reports and statements to meet the unique needs of your business and stakeholders.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-shield"></i>
                  <h4>Expense Mastery</h4>
                  <p>Effortlessly manage expenses, ensuring control over costs and optimizing financial resources.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-atom"></i>
                  <h4>Integration Excellence</h4>
                  <p>Seamlessly integrate with other business systems for a holistic view of your organization's operations.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                  <i class="bx bx-id-card"></i>
                  <h4>Compliance Assurance</h4>
                  <p>Stay on top of regulations and compliance effortlessly, supporting both internal and external audits</p>
                </div>
              </div>
            </div>
          </div>
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="mainpage/img/features.svg" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </section>


    <section id="details" class="details">
      <div class="container">

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="mainpage/img/details-1.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-4" data-aos="fade-up">
            <h3>Real-time Insights</h3>
            <br>
            <ul>
              <li><i class="bi bi-check"></i> Monitor financial health with live analytics.</li>
              <li><i class="bi bi-check"></i> Track income, expenses, and budgets in real-time.</li>

            </ul>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="mainpage/img/details-2.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Financial management app</h3>
            <br>
            <p>
                A comprehensive solution designed to revolutionize the way you handle your finances. With real-time insights, you can monitor your financial health effortlessly, keeping track of income, expenses, and budgets in the blink of an eye. Intelligent budgeting tools empower you to plan and forecast with ease, helping you set and achieve financial goals seamlessly. Customize your financial reporting to present complex data in a visually appealing manner, simplifying the understanding of crucial information.
            </p>

          </div>
        </div>

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="mainpage/img/details-3.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5" data-aos="fade-up">
            <h3>Intelligent Budgeting</h3>
            <br>
            <ul>
              <li><i class="bi bi-check"></i> Plan and forecast with smart budgeting tools.</li>
              <li><i class="bi bi-check"></i> Set and achieve financial goals effortlessly.</li>

            </ul>
            <p>
                The app's custom integrations enable seamless connectivity with other business tools, allowing you to tailor integrations to meet your specific needs.
            </p>
            <p>
                Stay informed with smart notifications, receiving timely alerts and reminders for upcoming payments and important financial milestones.
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="mainpage/img/details-4.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Collaboration and Sharing</h3>
            <p >
                Streamline the tracking of expenses, optimize spending, and effortlessly categorize receipts.
            </p>
            <p>
                Sync transactions, payments, and milestones seamlessly with our integrated financial calendar, ensuring you never miss a deadline or an important financial event.
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Foster transparency with team collaboration.</li>
              <li><i class="bi bi-check"></i> hare insights and enhance cooperation.</li>
              <li><i class="bi bi-check"></i> Stay informed with timely alerts and reminders.</li>
            </ul>
          </div>
        </div>

      </div>
    </section>


  </main>


  <footer id="footer">




    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong> &nbsp;<?= date('Y');?>&nbsp; <span>Financial Guardian System</span></strong>. All Rights Reserved

      </div>
    </div>
  </footer>>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <script src="mainpage/vendor/aos/aos.js"></script>
  <script src="mainpage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="mainpage/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="mainpage/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="mainpage/vendor/php-email-form/validate.js"></script>

  <script src="mainpage/js/main.js"></script>
  {{-- <script>

  </script> --}}

</body>

</html>
