@extends('layouts.main')


  <header class="football-header">
    @include('layouts.partials.header')
  </header>
@section('content')


<!--// Main Banner //-->
<div id="mainbanner">
  <div class="flexslider">
    <ul class="slides">
      <li>
        <!--// THUMB SLIDER START //-->
        <div class="thumb-slider">
          <img src="{{asset('template/extra-images/slide4.jpg')}}" alt="" />
          <div class="container">
            <div class="kode-ft-caption text-left"> 
              <div class="football-caption">      
                <h6>Torneo</h6>
                <h5>Scudetto</h5>
                <h5>ZONA</h5>
              </div>
              <div class="clearfix"></div>        
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!--// THUMB SLIDER END //-->
      </li>
      <li>
        <!--// THUMB SLIDER START //-->
        <div class="thumb-slider">
          <img src="{{asset('template/extra-images/slide5.jpg')}}" alt="" />
          <div class="container">
            <div class="kode-ft-caption text-left"> 
              <div class="football-caption">      
                <h6>Torneo</h6>
                <h5>Scudetto</h5>
                <h5>ZONA</h5>
              </div>
              <div class="clearfix"></div>        
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!--// THUMB SLIDER END //-->
      </li>
      <li>
        <!--// THUMB SLIDER START //-->
        <div class="thumb-slider">
          <img src="{{asset('template/extra-images/slide2.jpg')}}" alt="" />
          <div class="container">
            <div class="kode-ft-caption text-right"> 
              <div class="football-caption">      
                <h6>Torneo</h6>
                <h5>Scudetto</h5>
                <h5>ZONA</h5>
              </div>
              <div class="clearfix"></div>        
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!--// THUMB SLIDER END //-->
      </li>
    </ul>
  </div>
</div>
<!--// Main Banner //-->

    <!--// Main Content //-->
    <div class="kode-content">
        <section class="ftb_goalpost">
          <div class="container">
            <div class="heading5 hdg_6">
              <h4>Acerca del <span>Scudetto</span></h4>
            </div>
            <div class="row text-center">
            <div class="col-md-4"></div>
              <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </section>

        <section class="ftb-gallery-bg">
          <div class="container">
            <div class="heading5">
            <h4>Nuestros  <span>Auspiciantes</span></h4>
            </div>
            <div class="ftb-gallery">
            <ul>
              <li>
              <figure>
                <img src="{{asset('img/tercer_cordon.jpg')}}" alt="">
                <figcaption>
                <h4>Tercer Cordon</h4>
                <a data-rel="{{asset('img/tercer_cordon.jpg')}}"><i class="fa fa-eye"></i></a>
                </figcaption>
              </figure>
              </li>
              <li>
              <figure>
                <img src="{{asset('img/zona.jpg')}}" alt="">
                <figcaption>
                <h4>Zona futbol</h4>
                <a data-rel="prettyPhoto[]" href="{{asset('img/zona.jpg')}}"><i class="fa fa-eye"></i></a>
                </figcaption>
              </figure>
              </li>
              <li>
              <figure>
                <img src="{{asset('img/vir.jpg')}}" alt="">
                <figcaption>
                <h4>VIR Centro Medico</h4>
                <a data-rel="prettyPhoto[]" href="{{asset('img/vir.jpg')}}"><i class="fa fa-eye"></i></a>
                </figcaption>
              </figure>
              </li>
            </ul>

            </div>
          </div>
        </section>
    </div>
    <!--// Main Content //-->

@endsection
