<!doctype html>
<html class="no-js" lang="pt-br">
   <head>
        <meta charset="utf-8"/>    
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="language" content="pt-br" /> 
        <meta name="author" content="{{env('DESENVOLVEDOR')}}"/>
        <meta name="designer" content="Renato Montanari">
        <meta name="publisher" content="Renato Montanari">
        <meta name="url" content="{{$configuracoes->dominio}}" />
        <meta name="keywords" content="{{$configuracoes->metatags}}">
        <meta name="distribution" content="web">
        <meta name="rating" content="general">
        <meta name="date" content="Dec 26">

        {!! $head ?? '' !!}

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{$configuracoes->getfaveicon()}}" />
          
        <!-- CSS here -->
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/preloader.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/meanmenu.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/swiper-bundle.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/backToTop.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/fontAwesome5Pro.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/flatiocn/flaticon.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/default.css')}}">
        <link rel="stylesheet" href="{{url('frontend/'.$configuracoes->template.'/assets/css/style.css')}}">

        @hasSection('css')
            @yield('css')
        @endif
   </head>
   <body>
      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

      <!-- preloader start -->
      <div id="preloader">
         <div class="preloader">
            <span></span>
            <span></span>
         </div>
      </div>
      <!-- preloader end -->

      <!-- back to top start -->
      <div class="progress-wrap">
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
      </div>
      <!-- back to top end -->

      <!-- top-nav-start -->
      <header class="top-nav">
         <div class="top-address d-none d-lg-block">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-7 col-xl-5 col-lg-4 col-md-3">
                     <div class="top-logo">
                        <a href="{{route('web.home')}}">
                            <img src="{{$configuracoes->getLogomarca()}}" alt="{{$configuracoes->nomedosite}}">
                        </a>
                     </div>
                  </div>
                  <div class="col-xxl-5 col-xl-7 col-lg-8 col-md-9">
                     <div class="topbar-info">
                        <div class="contact-item">
                           <i class="flaticon-pin"></i>
                           <div class="content">
                              <p>Our Location</p>
                              <a href="https://www.google.com/maps/search/25%2F7+Barden,+London/@51.5287718,-0.2416803,11z/data=!3m1!4b1" target="blank">25/7 Barden, London</a>
                           </div>
                        </div>
                        <div class="contact-item">
                           <i class="flaticon-email"></i>
                           <div class="content">
                              <p>Online Support</p>
                              <a href="/cdn-cgi/l/email-protection#b7ded9d1d8f7d1d2c3d8cfd28599d4d8da"><span class="__cf_email__" data-cfemail="c9a0a7afa689afacbda6b1acfbe7aaa6a4">[email&#160;protected]</span></a>
                           </div>
                        </div>
                        <div class="contact-item">
                           <i class="flaticon-contact"></i>
                           <div class="content">
                              <p>Free Contact</p>
                              <a href="tel:02-325-562-3652">02-325-562-3652</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="menu-area" id="header-sticky">
            <div class="container">
               <div class="row align-items-center justify-content-center">
                  <div class="col-xxl-12 col-xl-12 col-lg-12">
                     <div class="topcontact-btn f-right d-none d-lg-block">
                        <div class="contact-btn">
                           <a href="contact.html" class="top-btn">Contact Us <i class="fal fa-chevron-double-right"></i></a>
                        </div>
                     </div>
                     <div class="menu-content">
                        <div class="top-logo d-lg-none">
                           <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <div class="main-menu">
                           <nav id="mobile-menu">
                              <ul>
                                 <li><a href="index.html" class="active">Home </a></li>
                                 <li><a href="about.html">About </a></li>
                                 <li><a href="about.html">Pages <i class="fal fa-plus dropdown-icon"></i></a>
                                    <ul class="sub-menu">
                                       <li><a href="classes.html">Classes</a></li>
                                       <li><a href="classes-details.html">Classes Details</a></li>
                                       <li><a href="team.html">Team</a></li>
                                       <li><a href="team-details.html">Team Details</a></li>
                                       <li><a href="price.html">Pricing Plan</a></li>
                                       <li><a href="cart.html">Cart</a></li>
                                       <li><a href="checkout.html">Checkout</a></li>
                                       <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="shop.html">Shop <i class="fal fa-plus dropdown-icon"></i></a>
                                    <ul class="sub-menu">
                                       <li><a href="shop.html">Shop </a></li>
                                       <li><a href="shop-details.html">Shop Details</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="protfolio.html">Portfolio <i class="fal fa-plus dropdown-icon"></i></a>
                                    <ul class="sub-menu">
                                       <li><a href="protfolio.html">Portfolio </a></li>
                                       <li><a href="protfolio-details.html">Portfolio Details</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="blog.html">Blog <i class="fal fa-plus dropdown-icon"></i></a>
                                    <ul class="sub-menu">
                                       <li><a href="blog.html">Blog </a></li>
                                       <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="contact.html">Contact </a></li>
                              </ul>
                           </nav>
                        </div>
                        <div class="side-menu-icon d-lg-none text-end">
                           <a href="javascript:void(0)" class="info-toggle-btn f-right sidebar-toggle-btn"><i class="fal fa-bars"></i></a>
                        </div>
                        <div class="header-action-btn f-right d-none d-lg-block">
                           <a href="javascript:void(0)" data-bs-toggle="modal" class="search" data-bs-target="#search-modal"><i class="far fa-search"></i></a>
                           <a href="cart.html"><i class="fas fa-shopping-basket"></i>
                              <span>0</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- top-nav-end -->

      <!-- sidebar area start -->
      <div class="sidebar__area">
         <div class="sidebar__wrapper">
            <div class="sidebar__close">
               <button class="sidebar__close-btn" id="sidebar__close-btn">
                  <i class="fal fa-times"></i>
               </button>
            </div>
            <div class="sidebar__content">
               <div class="sidebar__logo mb-40">
                  <a href="index.html">
                  <img src="assets/img/logo/logo.png" alt="logo">
                  </a>
               </div>
               <div class="sidebar__search mb-25">
                  <form action="#">
                     <input type="text" placeholder="What are you searching for?">
                     <button type="submit" ><i class="far fa-search"></i></button>
                  </form>
               </div>
               <div class="mobile-menu fix"></div>
               <div class="sidebar__contact mt-30 mb-20">
                  <h4>Contact Info</h4>
                  <ul>
                     <li class="d-flex align-items-center">
                        <div class="sidebar__contact-icon mr-15">
                           <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="sidebar__contact-text">
                           <a target="_blank" href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A, Mirnada City Tower, NYC</a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="sidebar__contact-icon mr-15">
                           <i class="far fa-phone"></i>
                        </div>
                        <div class="sidebar__contact-text">
                           <a href="tel:+012-345-6789">088889797697</a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="sidebar__contact-icon mr-15">
                           <i class="fal fa-envelope"></i>
                        </div>
                        <div class="sidebar__contact-text">
                           <a href="/cdn-cgi/l/email-protection#7c0f090c0c130e083c1b111d1510521f1311"><span class="__cf_email__" data-cfemail="5d2e282d2d322f291d303c3431733e3230">[email&#160;protected]</span></a>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="sidebar__social">
                  <ul>
                     <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                     <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- sidebar area end -->      
      <div class="body-overlay"></div>
      <!-- sidebar area end -->

      <main>
        <!-- INÍCIO DO CONTEÚDO DO SITE -->
        @yield('content')
        <!-- FIM DO CONTEÚDO DO SITE -->
      </main>

      <!-- footer-area-start -->
      <footer>
         <div class="footer-area" data-background="assets/img/bg/footer-bg.jpg">
            <div class="footer_top-info">
               <div class="container custome-container">
                  <div class="news-letter-area pt-100 pb-20">
                     <div class="row align-items-center">
                        <div class="col-lg-5">
                           <h5 class="news-letter-title mb-30">Subscribe Newsletter</h5>
                        </div>
                        <div class="col-lg-7">
                           <form action="#">
                              <div class="news_letter-info">
                                 <div class="news_letter_search mb-30">
                                    <input type="text" placeholder="Email Address |">
                                 </div>
                                 <div class="subscrive-button mb-30">
                                    <button type="submit" class="tp-btn-round-newsletter">Subscribe now <i class="fal fa-chevron-double-right"></i></button>
                                 </div>
                           </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-content pt-80 pb-45">
               <div class="container custome-container">
                  <div class="row g-0">
                     <div class="col-lg-4 col-md-8 col-sm-8">
                        <div class="footer-widget fotter-col2 wow fadeInUp mb-40" data-wow-delay=".3s">
                           <div class="footer-logo mb-25">
                              <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                           </div>
                           <p class="pb-30">Consequat lacinia into gravida nisie facils porto lorem ultricies vivamus maecenas one iaculis</p>
                           <div class="footer-social">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                 <a href="#"><i class="fab fa-google-plus-g"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="footer-widget wow fadeInUp mb-40" data-wow-delay=".6s">
                           <h5 class="fotter_widget-title mb-35">Projects</h5>
                           <ul class="fotter_project_lists">
                              <li><a href="protfolio-details.html">February - 2020</a></li>
                              <li><a href="protfolio-details.html">March - 2020</a></li>
                              <li><a href="protfolio-details.html">October - 2020</a></li>
                              <li><a href="protfolio-details.html">November - 2020</a></li>
                              <li><a href="protfolio-details.html">January - 2021</a></li>
                              <li><a href="protfolio-details.html">February - 2021</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget wow fadeInUp mb-40" data-wow-delay=".9s">
                           <h5 class="fotter_widget-title mb-35">Contact Info</h5>
                           <div class="footer__info">
                              <ul>
                                 <li class="d-flex align-items-start pt-5 mb-20">
                                    <div class="footer__info-icon mr-20">
                                       <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="footer__info-text">
                                       <a target="_blank" href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">25/A, Brokelyn <br> Square Circle, New York</a>
                                    </div>
                                 </li>
                                 <li class="d-flex align-items-start mb-20">
                                    <div class="footer__info-icon mr-20">
                                       <i class="far fa-envelope-open"></i>
                                    </div>
                                    <div class="footer__info-text">
                                       <span>Email:</span>
                                       <a href="/cdn-cgi/l/email-protection#70030500001f020430171d11191c5e131f1d"><span class="__cf_email__" data-cfemail="34474144445b4640745359555d581a575b59">[email&#160;protected]</span></a>
                                    </div>
                                 </li>
                                 <li class="d-flex align-items-start mb-20">
                                    <div class="footer__info-icon mr-20">
                                       <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="footer__info-text">
                                       <span>Phone:</span>
                                       <a href="tel:+012-345-6789">+012 (344) 678 99</a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div> 
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget wow fadeInUp mb-40" data-wow-delay="1.3s">
                           <h5 class="fotter_widget-title mb-35">Recent Post</h5>
                           <div class="footer__blog">
                              <ul>
                                 <li class="mb-25 pt-5">
                                    <div class="footer__blog-sm d-flex align-items-center">
                                       <div class="footer__blog-sm-thumb mr-25">
                                          <a href="blog-details.html">
                                             <img src="assets/img/blog/footer-blog.jpg" alt="">
                                          </a>
                                       </div>
                                       <div class="footer__blog-sm-content">
                                          <h6 class="footer__blog-sm-title">
                                             <a href="blog-details.html">Malesuada bagittis introc dolor curabitur</a>
                                          </h6>
                                          <div class="footer__blog-sm-meta">
                                             <p><span>25 nov 2021</span></p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="footer__blog-sm d-flex align-items-center">
                                       <div class="footer__blog-sm-thumb mr-20">
                                          <a href="blog-details.html">
                                             <img src="assets/img/blog/footer-blog2.jpg" alt="">
                                          </a>
                                       </div>
                                       <div class="footer__blog-sm-content">
                                          <h6 class="footer__blog-sm-title">
                                             <a href="blog-details.html">Introc bagittis curabitur malesuada dolor</a>
                                          </h6>
                                          <div class="footer__blog-sm-meta">
                                             <p>25 nov 2021</p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copy-right-area">
               <div class="container custome-container">
                  <div class="copyright-info">
                     <div class="owner_name">
                        <p>Copyright <a href="#">Futexo</a> ©2022. All Rights Reserved</p>
                     </div>
                     <div class="copy-right_useful_link">
                        <a href="contact.html">Terms & Conditions</a>
                        <a href="protfolio-details.html">. Services</a>
                        <a href="contact.html">. Privacy</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-shape fix">
               <img src="assets/img/bg/footer-shape.png" alt="">
            </div>
            <div class="footer-shape-two fix">
               <img src="assets/img/bg/footer-shape1.png" alt="">
            </div>
            <div class="footer-curve fix">
               <img src="assets/img/bg/footer-curve.png" alt="">
            </div>
         </div>
      </footer>
      <!-- footer-area-end -->


      <!-- modal-search-start -->
      <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
         </button>
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <form>
                     <input type="text" placeholder="Search here...">
                     <button>
                        <i class="fa fa-search"></i>
                     </button>
               </form>
            </div>
         </div>
      </div>
      <!-- modal-search-end -->

    <!-- JS here -->
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/vendor/waypoints.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/meanmenu.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/parallax.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/backToTop.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/nice-select.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/counterup.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/ajax-form.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/wow.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{url('frontend/'.$configuracoes->template.'/assets/js/main.js')}}"></script>
   
    @hasSection('js')
        @yield('js')
    @endif    

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$configuracoes->tagmanager_id}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', '{{$configuracoes->tagmanager_id}}');
    </script>
    </body>
</html>