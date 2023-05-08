@extends("web.{$configuracoes->template}.master.master")

@section('content')
@if (!empty($slides) && $slides->count() > 0)
<div class="hero-area fix">
    <div class="hero-slider slider__active swiper-container swiper-container-fade">
        <div class="swiper-wrapper p-relative">
            <div class="hero-pagination"></div>
            @foreach ($slides as $key => $slide)  
                <div class="item-slider swiper-slide">
                    <div class="slide-bg img-slide" data-background="{{$slide->getimagem()}}"></div>
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="slider-all-text">
                                    <span data-animation="fadeInUp" data-delay=".2s">{{$slide->categoria}}</span>
                                    <p class="description mt-10 mb-50" data-animation="fadeInUp" data-delay=".6s">{{$slide->titulo}}</p>
                                    @if ($slide->link)
                                       <div class="play-option" data-animation="fadeInUp" data-delay=".8s">
                                          <a {{($slide->target == 1 ? 'target="_blank"' : '')}} href="{{$slide->link}}" class="tp-btn">Saiba Mais <i class="fal fa-chevron-double-right"></i></a>
                                          @php
                                             if (strpos($slide->link, 'youtube') !== false) {
                                                echo '<a class="video-play-button hero-play popup-video ml-30" href="https://www.youtube.com/watch?v=ZoZSp-wy8h8">
                                                         <i class="fas fa-play"></i>
                                                      </a>';
                                             }
                                          @endphp                                          
                                       </div>
                                    @endif                                    
                                </div>
                                <div class="hero-social-icon">
                                    @if ($configuracoes->facebook)
                                        <a target="_blank" href="{{$configuracoes->facebook}}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if ($configuracoes->twitter)
                                        <a target="_blank" href="{{$configuracoes->twitter}}" title="Twitter"><i class="fab fa-twitter"></i></a>
                                    @endif
                                    @if ($configuracoes->instagram)
                                        <a target="_blank" href="{{$configuracoes->instagram}}" title="Instagram"><i class="fab fa-instagram"></i></a>
                                    @endif
                                    @if ($configuracoes->linkedin)
                                        <a target="_blank" href="{{$configuracoes->linkedin}}" title="linkedin"><i class="fab fa-linkedin"></i></a>
                                    @endif
                                    @if ($configuracoes->youtube)
                                        <a target="_blank" href="{{$configuracoes->youtube}}" title="Youtube"><i class="fab fa-youtube"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                
            @endforeach             
        </div>
    </div>
</div>
@endif

 
 <!-- tp-about-area-start 
 <div class="tp-about-area pb-95 pt-80">
    <div class="container">
       <div class="row">
          <div class="col-xl-5 col-lg-6">
             <div class="about-image mb-30 wow fadeInUp" data-wow-delay=".4s" >
                <img src="assets/img/about/about-1.jpg" alt="" class="img-fluid">
                <div class="about-shape">
                   <img src="assets/img/about/about-shape.png" alt="">
                   <div class="content">
                      <h4>25 + Year</h4>
                       <span>Work Experience</span>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-7 col-lg-6 ">
             <div class="about-info wow fadeInUp" data-wow-delay=".7s">
                <div class="section-wrap">
                   <span class="tpsub-title mb-15">About us</span>
                   <h3 class="section-title mb-20">Make yourself stronger than
                   your best excuses</h3>
                   <span class="section-border mb-20"><i class="far fa-circle"></i></span>
                   <p class="section-description mb-40">Duis nunc sodales conubia a laoreet aliquet on nostra eleifend lacinia prasent hendrerit quisque penatibus erat a pulvina integer semper ridiculus lectus con dimentum obor tise verodar capmtaso morin</p>
                </div>
                <blockquote class="ab-bquote">
                   <span>Push harder than yesterday if you want on
                      the different tomorrow.</span>
                   <div class="quote">
                      <img src="assets/img/about/quote.png" alt="">
                   </div>
                </blockquote>
                <div class="author-info">
                   <div class="author-data">
                      <div class="author_img mb-30"><a href="#"><img src="assets/img/about/author.jpg" alt=""></a></div>
                      <div class="author-degination mb-30">
                         <h4>Mark Hander</h4>
                         <span>CEO - Fetoxe</span>
                      </div>
                   </div>
                   <div class="about-btn mb-30">
                      <a href="about.html" class="tp-btn-round">What do we do <i class="fal fa-chevron-double-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="about-bg-shape">
       <img src="assets/img/about/about-bg-png.png" alt="" class="img-fluid">
    </div>
 </div>
-->


 {{-- tpcounter-area 
 <div class="tpcounter-area">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="counter-lists">
                <div class="row g-0">
                   <div class="col-lg-3 col-md-6">
                      <div class="counter-item counter-item-border">
                         <div class="counter-number">
                            <h4><span class="counter">330</span></h4>
                         </div>
                         <div class="counterinfo">
                            <i class="flaticon-support"></i>
                            <span>Expert Trainer</span>
                         </div>
                         <div class="counter-shape">
                            <img src="assets/img/bg/counter-shape.png" alt="">
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-3 col-md-6">
                      <div class="counter-item counter-item-border">
                         <div class="counter-number">
                            <h4><span class="counter">430</span></h4>
                         </div>
                         <div class="counterinfo">
                            <i class="flaticon-feedback"></i>
                            <span>Client Feedback</span>
                         </div>
                         <div class="counter-shape">
                            <img src="assets/img/bg/counter-shape.png" alt="">
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-3 col-md-6">
                      <div class="counter-item counter-item-border">
                         <div class="counter-number">
                            <h4><span class="counter">230</span></h4>
                         </div>
                         <div class="counterinfo">
                            <i class="flaticon-kettlebells"></i>
                            <span>Total Branches</span>
                         </div>
                         <div class="counter-shape">
                            <img src="assets/img/bg/counter-shape.png" alt="">
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-3 col-md-6">
                      <div class="counter-item">
                         <div class="counter-number">
                            <h4><span class="counter">540</span></h4>
                         </div>
                         <div class="counterinfo">
                            <i class="flaticon-medal"></i>
                            <span>Award Winning</span>
                         </div>
                         <div class="counter-shape">
                            <img src="assets/img/bg/counter-shape.png" alt="">
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
  --}}

 <!-- fitness-gallery-area-start 
 <div class="fitness-gallery-area">
    <div class="container">
       <div class="wow fadeInUp" data-wow-delay=".2s">
          <div class="row justify-content-center align-items-center">
             <div class="col-xl-6 col-lg-7">
                <div class="section-wrap">
                   <span class="tpsub-title mb-15">Fitness gallery</span>
                   <h3 class="section-title mb-20">Solutions for moving better and feeling a healthier</h3>
                   <span class="section-border mb-30"><i class="far fa-circle"></i></span>
                </div>
             </div>
             <div class="col-xl-4 col-lg-5">
                <div class="fitness_button">
                   <a href="protfolio-details.html" class="tp-btn-round">All showcase <i class="fal fa-chevron-double-right"></i></a>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="fitnes-gallery-shape">
       <img src="assets/img/protfolio/gallery-shape.png" class="img-fluid" alt="">
    </div>
    <div class="fitnes-gallery-shape-2">
       <img src="assets/img/protfolio/gallery-shape-2.png" class="img-fluid" alt="">
    </div>
    <div class="gallery-items fix">
       <div class="container-fluid">
          <div class="row mt-55 gx-0">
             <div class="col-xxl-12 gx-0">
                <div class="fitness-slider_active owl-carousel">
                   <div class="fitness-item position-relative  wow flipInY" data-wow-delay=".3s"> 
                      <a href="protfolio-details.html"><img src="assets/img/protfolio/g-1.jpg" alt="" class="img-fluid"></a>
                      <div class="fitness-info">
                         <div class="fitness-content">
                            <span><a href="protfolio-details.html">Couple Fitness Workout</a></span>
                            <p>Weight loss Program</p>
                         </div>
                         <div class="fitness-icon">
                            <a href="protfolio-details.html" class="tp-btn-circle"><i class="fal fa-chevron-double-right"></i></a>
                         </div>
                      </div>
                   </div>
                   <div class="fitness-item position-relative wow flipInY" data-wow-delay=".6s">
                      <a href="protfolio-details.html"><img src="assets/img/protfolio/g-3.jpg" alt="" class="img-fluid"></a>
                      <div class="fitness-info">
                         <div class="fitness-content">
                            <span><a href="protfolio-details.html">Couple Fitness Workout</a></span>
                            <p>Weight loss Program</p>
                         </div>
                         <div class="fitness-icon">
                            <a href="protfolio-details.html" class="tp-btn-circle"><i class="fal fa-chevron-double-right"></i></a>
                         </div>
                      </div>
                   </div>
                   <div class="fitness-item position-relative wow flipInY" data-wow-delay=".9s">
                      <a href="protfolio-details.html"><img src="assets/img/protfolio/g-4.jpg" alt="" class="img-fluid"></a>
                      <div class="fitness-info">
                         <div class="fitness-content">
                            <span><a href="protfolio-details.html">Couple Fitness Workout</a></span>
                            <p>Weight loss Program</p>
                         </div>
                         <div class="fitness-icon">
                            <a href="protfolio-details.html" class="tp-btn-circle"><i class="fal fa-chevron-double-right"></i></a>
                         </div>
                      </div>
                   </div>
                   <div class="fitness-item position-relative wow flipInY" data-wow-delay=".9s">
                      <a href="protfolio-details.html"><img src="assets/img/protfolio/g-5.jpg" alt="" class="img-fluid"></a>
                      <div class="fitness-info">
                         <div class="fitness-content">
                            <span><a href="protfolio-details.html">Couple Fitness Workout</a></span>
                            <p>Weight loss Program</p>
                         </div>
                         <div class="fitness-icon">
                            <a href="protfolio-details.html" class="tp-btn-circle"><i class="fal fa-chevron-double-right"></i></a>
                         </div>
                      </div>
                   </div>
                   <div class="fitness-item position-relative wow flipInY" data-wow-delay=".9s">
                      <a href="protfolio-details.html"><img src="assets/img/protfolio/g-6.jpg" alt="" class="img-fluid"></a>
                      <div class="fitness-info">
                         <div class="fitness-content">
                            <span><a href="protfolio-details.html">Couple Fitness Workout</a></span>
                            <p>Weight loss Program</p>
                         </div>
                         <div class="fitness-icon">
                            <a href="protfolio-details.html" class="tp-btn-circle"><i class="fal fa-chevron-double-right"></i></a>
                         </div>
                      </div>
                   </div>
                   <div class="fitness-item position-relative wow flipInY" data-wow-delay=".9s">
                      <a href="protfolio-details.html"><img src="assets/img/protfolio/g-7.jpg" alt="" class="img-fluid"></a>
                      <div class="fitness-info">
                         <div class="fitness-content">
                            <span><a href="protfolio-details.html">Couple Fitness Workout</a></span>
                            <p>Weight loss Program</p>
                         </div>
                         <div class="fitness-icon">
                            <a href="protfolio-details.html" class="tp-btn-circle"><i class="fal fa-chevron-double-right"></i></a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
  -->

 <!-- schedule-area-start 
 <div class="schedule-area pb-110">
    <div class="container custome-container">
       <div class="section-wrap-two text-center">
          <span class="tpsub-title-two mb-15"><i class="far fa-circle"></i>our schedule<i class="far fa-circle"></i></span>
          <h3 class="section-title-two  mb-30">Check our every special gemoxe schedule for you </h3>
       </div>
    </div>
    <div class="schedule-shape-bg fix">
       <img src="assets/img/features/schedule-shape.png"  class="img-fluid" alt="">
    </div>
    <div class="schedule-shape-one fix">
       <img src="assets/img/features/schedule-shape-1.png"  class="img-fluid" alt="">
    </div>
    <div class="schedule-shape-two fix">
       <img src="assets/img/features/schedule-shape-2.png"  class="img-fluid" alt="">
    </div>
    <div id="futexo-classes-area" class="mt-65">
       <div class="container custome-container">
           <div class="futexo-classes-content">
               <div class="row justify-content-center">
                   <div class="col-lg-12">
                       <div class="futexo-classes-tab">
                           <div class="tab-content current">
                               <div class="futexo-tab-d futexo-tab-all">
                                  <span class="schedule-icon">
                                     <i class="flaticon-muscle"></i>
                                  </span>
                                  <ul>
                                     <li><span class="time">07:00 am</span></li>
                                     <li><span class="time">10:00 am</span></li>
                                     <li><span class="time">04:00 pm</span></li>
                                     <li><span class="time">06:00 pm</span></li>
                                     <li><span class="time">08:00 pm</span></li>
                                  </ul>
                               </div>
                               <div class="futexo-tab-all">
                                  <h5>sunday</h5>
                                  <ul>
                                      <li><span>Boxing</span>Alena Jopsep</li>
                                      <li><span>Cardio</span>Bull Mentor</li>
                                      <li><span>Yoga</span>Fiter Jamson</li>
                                      <li><span>Cardio</span>Bull Mentor</li>
                                      <li><span>Ultragym</span>Roser Mack</li>
                                  </ul>
                               </div>
                               <div class="futexo-tab-all">
                                   <h5>Monday</h5>
                                   <ul>
                                       <li><span>Ultragym</span>Roser Mack</li>
                                       <li><span>Aerobics</span>Bull Mentor</li>
                                       <li></li>
                                       <li><span>Aerobics</span>Bull Mentor</li>
                                       <li><span>Boxing</span>Alena Josep</li>
                                   </ul>
                               </div>
                               <div class="futexo-tab-all">
                               <h5>Tuesday</h5>
                               <ul>
                                   <li><span>Yoga</span>Fiter Jamson</li>
                                   <li><span>Ultragym</span>Younji</li>
                                   <li><span>Yoga</span>Fiter Jamson</li>
                                   <li><span>Boxing</span>Franky</li>
                                   <li></li>
                               </ul>
                               </div>
                               <div class="futexo-tab-all">
                                  <h5>Wednesday</h5>
                                  <ul>
                                     <li><span>Aerobics</span>Madara</li>
                                     <li></li>
                                     <li><span>Ultragym</span>Fiter Jamson</li>
                                     <li></li>
                                     <li><span>Ultragym</span>Roser Mack</li>
                                  </ul>
                               </div>
                               <div class="futexo-tab-all">
                                  <h5>Thursday</h5>
                                  <ul>
                                     <li><span>Cardio</span>Cosmo Kito</li>
                                     <li><span>Boxing</span>Iqbal Mentor</li>
                                     <li><span>Yoga</span>Fiter Jamson</li>
                                     <li><span>Aerobics</span>Bull Mentor</li>
                                     <li><span>Ultragym</span>Roser Mack</li>
                                  </ul>
                               </div>
                               <div class="futexo-tab-all">
                                  <h5>Friday</h5>
                                  <ul>
                                     <li></li>
                                     <li><span>Yoga</span>Bull Mentor</li>
                                     <li><span>Cardio</span>Bull Mentor</li>
                                     <li><span>Ultragym</span>Roser Mack</li>
                                     <li><span>Yoga</span>Fiter Jamson</li>
                                  </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

    </div>
 </div>
  --> 

 <!-- choose-us-area-start 
 <div class="choose-us-area pt-120 pb-65">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-6">
             <div class="choose-iamge mb-30">
                <img src="assets/img/bg/choose.jpg" alt="choose-img">
             </div>
          </div>
          <div class="col-xl-6 col-lg-6">
             <div class="choose-info">
                <div class="section-wrap mb-35">
                   <span class="tpsub-title mb-15">Why choose us</span>
                   <h3 class="section-title mb-20">Make yourself stronger than your best excuses</h3>
                   <span class="section-border mb-30"><i class="far fa-circle"></i></span>
                </div>
                <div class="choose-list mb-40">
                   <div class="choose-icon-wrap">
                      <div class="choose-icon">
                         <i class="flaticon-dumbbell"></i>
                      </div>
                   </div>
                   <div class="choose-content">
                      <h5>Cardio Exercise</h5>
                      <p>Sultan and interdu mmassa pellentesque mattis vulputate nam hyme lectus parturient accumsan.</p>
                   </div>
                </div>
                <div class="choose-list mb-40">
                   <div class="choose-icon-wrap">
                      <div class="choose-icon">
                         <i class="flaticon-hand-grip"></i>
                      </div>
                   </div>
                   <div class="choose-content">
                      <h5>Cardio Exercise</h5>
                      <p>Lectus parturient pellentesque accumsan mattis vulputate nam hyme sultan and interdum massa.</p>
                   </div>
                </div>
                <div class="choose-list mb-40">
                   <div class="choose-icon-wrap">
                      <div class="choose-icon">
                         <i class="flaticon-shirt"></i>
                      </div>
                   </div>
                   <div class="choose-content">
                      <h5>Cardio Exercise</h5>
                      <p>Vulputate nam massa pellentesque accumsan hyme lectus parturient sultan and interdum mattis.</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
  -->

 <!-- 
 <div class="trainer-area pb-150">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-lg-10">
             <div class="section-wrap-two text-center wow fadeInUp" data-wow-delay=".2s">
                <span class="tpsub-title-two mb-15"><i class="far fa-circle"></i>Best Trainer<i class="far fa-circle"></i></span>
                <h3 class="section-title-two  mb-30">Dedicated and professional trainer ready to supporting</h3>
             </div>
          </div>
       </div>
    </div>
    <div class="container">
       <div class="row mt-35">
          <div class="col-xxl-3 col-lg-4 col-md-6">
             <div class="trainer-single wow fadeInUp mb-30" data-wow-delay=".4s">
                <div class="trainer-image">
                   <a href="team-details.html"><img src="assets/img/trainer/trainer-1.jpg" alt=""></a>
                </div>
                <div class="trainer-info">
                   <h5 class="trainer-name"><a href="team-details.html">Desert Antony</a></h5>
                   <p class="mb-20">Fitness Trainer</p>
                   <div class="trainer-soicial-icon">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-google"></i></a>
                   </div>
                </div>
                <div class="trainer-btn">
                   <a href="team-details.html" class="tp-btn-square"><i class="fal fa-chevron-double-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-md-6">
             <div class="trainer-single wow fadeInUp mb-30" data-wow-delay=".8s">
                <div class="trainer-image">
                   <a href="team-details.html"><img src="assets/img/trainer/trainer-2.jpg" alt=""></a>
                </div>
                <div class="trainer-info">
                   <h5 class="trainer-name"><a href="team-details.html">Desert Antony</a></h5>
                   <p class="mb-20">Fitness Trainer</p>
                   <div class="trainer-soicial-icon">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-google"></i></a>
                   </div>
                </div>
                <div class="trainer-btn">
                   <a href="team-details.html" class="tp-btn-square"><i class="fal fa-chevron-double-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-md-6">
             <div class="trainer-single wow fadeInUp mb-30" data-wow-delay="1.2s">
                <div class="trainer-image">
                   <a href="team-details.html"><img src="assets/img/trainer/trainer-3.jpg" alt=""></a>
                </div>
                <div class="trainer-info">
                   <h5 class="trainer-name"><a href="team-details.html">Desert Antony</a></h5>
                   <p class="mb-20">Fitness Trainer</p>
                   <div class="trainer-soicial-icon">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-google"></i></a>
                   </div>
                </div>
                <div class="trainer-btn">
                   <a href="team-details.html" class="tp-btn-square"><i class="fal fa-chevron-double-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-xxl-3 col-lg-4 col-md-6">
             <div class="trainer-single wow fadeInUp mb-30" data-wow-delay="1.4s">
                <div class="trainer-image">
                   <a href="team-details.html"><img src="assets/img/trainer/trainer-4.jpg" alt=""></a>
                </div>
                <div class="trainer-info">
                   <h5 class="trainer-name"><a href="team-details.html">Desert Antony</a></h5>
                   <p class="mb-20">Fitness Trainer</p>
                   <div class="trainer-soicial-icon">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-google"></i></a>
                   </div>
                </div>
                <div class="trainer-btn">
                   <a href="team-details.html" class="tp-btn-square"><i class="fal fa-chevron-double-right"></i></a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
  -->
 
@endsection

@section('css')
   
@endsection

@section('js')
  
@endsection