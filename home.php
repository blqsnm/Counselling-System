<?php
// home.php

session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] == 'admin') {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Counselling Services Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <div class="container-fluid sticky-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a href="home.php" class="navbar-brand">
          <h1 class="text-white"><span class="text-dark"></span>UTHM</h1>
        </a>
        <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto">
            <a href="#header" class="nav-item nav-link">Home</a>
            <a href="#about" class="nav-item nav-link">About</a>
            <a href="#assessment" class="nav-item nav-link">Assessment</a>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
              <div class="dropdown-menu bg-light mt-2">
                <a href="#faq" class="dropdown-item">FAQs</a>
                <a href="#team" class="dropdown-item">Our Team</a>
              </div>
            </div>
            <div>
              <a href="logout.php">
                <button type="button" class="btn btn-default btn-sm btn-light">
                  <i class="fas fa-sign-out-alt"></i> Log out
                </button>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- Navbar End -->

  <!-- Hero Start -->
 <section id="header">
  <div class="container-fluid pt-5 bg-primary hero-header mb-5">
    <div class="container pt-5">
      <div class="row g-5 pt-5">
        <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
       <a href="home.php" class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">UTHM</a>

          <h1 class="display-5 text-white mb-5 animated slideInRight">
            COUNSELLING SERVICES <span class="d-inline-block">MANAGEMENT SYSTEMS</span>
          </h1>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Hero End -->

  <!-- About Start -->
  <section id="about">
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row g-5 align-items-center">
          <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="about-img">
              <img class="img-fluid" src="img/about-img.jpg">
            </div>
          </div>
          <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <h1 class="mb-4">ABOUT US</h1>
            <p class="mb-4">Pusat Kaunseling Universiti (PCU) is a support center that is responsible for providing individual and group guidance and counseling services to students and satff of Universiti Tun Hussien Onn Malaysia (UTHM) as well as the local community so that they obtain well-being and psychological stability as well as encouragement to make positive personal changes. Apart from that, PCU also implements self-development programs for students and staff. The PCU is led by a director and three department heads consisting of trained and registered Psychology Officers and four administrative staff.</p>
            <div class="row g-3">
              <div class="col-sm-6">
                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
              </div>
              <div class="col-sm-6">
                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About End -->

  <!-- Assessment Start -->
  <section id="assessment">
    <div class="container-fluid bg-light py-5">
      <div class="container py-5">
        <div class="row g-5 align-items-center">
          <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Assessment</div>
            <h1 class="mb-5">Collection of Psychological and Psychometric Tests</h1>
            <p class="mb-4">There are various types of psychological and psychometric tests that you can try.Assessment is the most common method used in counseling sessions. This is because it is the easiest way to get information about our clients</p>
          </div>
          <div class="col-lg-7">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="row g-4">
                  <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                      <div class="service-icon btn-square">
                        <i class="fa fa-brain fa-2x"></i>
                      </div>
                      <h5 class="mb-3">DASS TEST</h5>
                      <p>Mental Health Screening Test or Depression Anxiety Stress Scale (DASS).</p>
                      <a class="btn px-3 mt-auto mx-auto" href="dass.html">GO</a>
                    </div>
                  </div>
                  <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                      <div class="service-icon btn-square">
                        <i class="fa fa-power-off fa-2x"></i>
                      </div>
                      <h5 class="mb-3">PERSONALITY TEST A AND B</h5>
                      <p>Discovering your genuine identity, assessing your distinct and individual behavioural inclinations, and other traits.</p>
                        <a class="btn px-3 mt-auto mx-auto" href="personality.html">GO</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                  <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                      <div class="service-icon btn-square">
                        <i class="fa fa-graduation-cap fa-2x"></i>
                      </div>
                      <h5 class="mb-3">LEARNING STYLE TEST</h5>
                      <p>The learning style inventory is designed to help respondents determine the learning style they have in order to identify the learning style that is appropriate according to individual tendencies.</p>
                      <a class="btn px-3 mt-auto mx-auto" href="gaya-belajar.html">GO</a>
                    </div>
                  </div>
                  <div class="col-12 wow fadeIn" data-wow-delay="0.7s"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
  <!-- Assessment End -->

  <!-- FAQs Start -->
  <section id="faq">
    <div class="container-fluid py-5">
      <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
          <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Popular FAQs</div>
          <h1 class="mb-4">Frequently Asked Questions</h1>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="accordion" id="accordionFAQ1">
              <div class="accordion-item wow fadeIn" data-wow-delay="0.1s">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Is the information during the counseling session confidential?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ1">
                  <div class="accordion-body">
                    Confidentiality is guaranteed unless the client threatens the safety of himself, others and actions that violate the Law.
                  </div>
                </div>
              </div>
              <div class="accordion-item wow fadeIn" data-wow-delay="0.2s">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    What issues can be brought to the counseling session?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ1">
                  <div class="accordion-body">
                    Any issue that can affect effectiveness and efficiency in life.
                  </div>
                </div>
              </div>
              <div class="accordion-item wow fadeIn" data-wow-delay="0.3s">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Are only Officers and staff referred or instructed by the Head of Department attending counselling sessions at the University Counselling Centre (PCU)?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ1">
                  <div class="accordion-body">
                    Nope. The University Counseling Center (PCU) also accepts clients who come voluntarily and are referred.
                  </div>
                </div>
              </div>
              <div class="accordion-item wow fadeIn" data-wow-delay="0.4s">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    Will my personal records be affected when I meet with the Psychological Officer?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionFAQ1">
                  <div class="accordion-body">
                    Your personal records are not affected when you meet with the Psychological Officer.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="accordion" id="accordionFAQ2">
              <div class="accordion-item wow fadeIn" data-wow-delay="0.5s">
                <h2 class="accordion-header" id="headingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Who can get services at the University Counseling Center (PCU)?
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionFAQ2">
                  <div class="accordion-body">
                    Services at the University Counseling Center are open to students, staff and the public.
                  </div>
                </div>
              </div>
              <div class="accordion-item wow fadeIn" data-wow-delay="0.6s">
                <h2 class="accordion-header" id="headingSix">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Are clients given the opportunity to choose a Psychological Officer?
                  </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionFAQ2">
                  <div class="accordion-body">
                    Yes. Every client is given the right to choose a Psychological Officer.
                  </div>
                </div>
              </div>
              <div class="accordion-item wow fadeIn" data-wow-delay="0.7s">
                <h2 class="accordion-header" id="headingSeven">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    If I come to see a Psychological Officer to get an opinion, will I be labeled as a troubled individual?
                  </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionFAQ2">
                  <div class="accordion-body">
                    Not because Psychological Officers practice Confidentiality Ethics.
                  </div>
                </div>
              </div>
              <div class="accordion-item wow fadeIn" data-wow-delay="0.8s">
                <h2 class="accordion-header" id="headingEight">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Where is the University Counseling Center (PCU) located?
                  </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionFAQ2">
                  <div class="accordion-body">
                    The University Counseling Center (PCU) is located in Building D15, Jalan Persiaran Tun Dr Awang Hassan next to the University Health Center Building (PKU).
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- FAQs End -->

  <!-- Team Start -->
  <section id="team">
    <div class="container-fluid bg-light py-5">
      <div class="container py-5">
        <div class="row g-5 align-items-center">
          <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Staff</div>
            <h1 class="mb-4">Meet Our Experienced Team Staff</h1>
            <p class="mb-4">We are committed to receiving clients with a friendly and attentive attitude. We are ready to provide service with courtesy, responsiveness and respect for individual rights. We are responsible for providing customer-friendly service.</p>
          </div>
          <div class="col-lg-7">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="row g-4">
                  <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                      <img class="img-fluid rounded-circle p-4" src="img/team-1.jpg" alt="">
                      <h5 class="mb-0">Dr. Noraishah Binti Daud</h5>
                      <small>Director Of University Counseling Center</small>
                      <div class="d-flex justify-content-center mt-3">
                        <a class="sf-icon-telephone e-btn e-link" href="tel:07-4537463"> 07-453 7463</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                      <img class="img-fluid rounded-circle p-4" src="https://cms.uthm.edu.my/images/PN%20ASPA.jpg" alt="">
                      <h5 class="mb-0">Dr. Aspalaila Binti Abdullah</h5>
                      <small>Deputy Chief Psychology Officer(S48) Staff Counselling Officer</small>
                      <div class="d-flex justify-content-center mt-3">
                        <a class="sf-icon-telephone e-btn e-link" href="tel:+07-4537464">07-4537464</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                  <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                      <img class="img-fluid rounded-circle p-4" src="img/team-3.jpg" alt="">
                      <h5 class="mb-0">En. Syahrul Nizam Bin Lukman</h5>
                      <small>Senior Psychological Officer Department of Psychosocial and Psychological Well-Being</small>
                      <div class="d-flex justify-content-center mt-3">
                        <a class="sf-icon-telephone e-btn e-link" href="tel:07-4537497"> 07-453 7497</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                      <img class="img-fluid rounded-circle p-4" src="img/team-4.jpg" alt="">
                      <h5 class="mb-0">En. Muhammad Khairullah Bin Mohd Shaari</h5>
                      <small>Psychological Officer (S41) Student Strengthening and Enrichment Department</small>
                      <div class="d-flex justify-content-center mt-3">
                        <a class="sf-icon-telephone e-btn e-link" href="tel:07-4537463"> 07-453 7453</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Team End -->


  <!-- Footer Start -->
   <div class="container-fluid bg-dark text-white-50 footer pt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <a href="index.html" class="d-inline-block mb-3">
                         <h1 class="text-white"><span class="text-primary"></span>UTHM</h1>

                    </a>
                    <p class="mb-0">UTHM's education and training is based on the monotheistic paradigm to produce competent, professional and entrepreneurial graduates driven by advanced technology for universal developmen</p>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <h5 class="text-white mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>   Pusat Kaunseling Universiti,<br>Universiti Tun Hussein Onn Malaysia,86400 Parit Raja,<br>Batu Pahat, Johor Malaysia.
          </p>

                    <p><i class="fa fa-phone-alt me-3"></i>+07-4537465/7461</p>
                    <p><i class="fa fa-envelope me-3"></i>kaunseling@uthm.edu.my</p>
                     <div class="d-flex pt-2">
           <a class="btn btn-outline-light btn-social" href="https://twitter.com/KKDK_UTHM"><i class="fab fa-twitter"></i></a>

            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/people/Pusat-Kaunseling-UTHM/100064693393133/" target="_blank"><i class="fab fa-facebook-f"></i></a>

            <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/@pusatkaunselinguthm5386">
  <i class="fab fa-youtube"></i>
</a>
                            <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/p/CskUxNLIBfb/"><i class="fab fa-instagram"></i></a>



                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <h5 class="text-white mb-4">Popular Link</h5>
                       <a class="btn btn-link" href="#header">Home</a>
          <a class="btn btn-link" href="#about">About us</a>
          <a class="btn btn-link" href="#assessment">Assessment</a>
                    <a class="btn btn-link" href="#team">Our Staff </a>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <h5 class="text-white mb-4">Our Assessment</h5>
                     <a class="btn btn-link" href="dass.html">Dass Test</a>
                   <a class="btn btn-link" href="personality.html">Personality Test A and B</a>
                     <a class="btn btn-link" href="gaya-belajar.html">Learning Style Test</a>
                </div>
            </div>
        </div>
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Pusat Kaunseling Universiti, UTHM</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
              <a href="#header">Home</a>
              <a href="#about">About</a>
                            <a href="#faq">FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2">
    <i class="bi bi-arrow-up"></i>
  </a>

  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>
</html>