<?php
require "header.php";
?>
<style type="text/css">
  .about,
  .about-team {
    background-color: #151515;
  }

  h4 {
    color: darkgrey !important;
  }

  .time-top h4,
  .testi-slider h4 {
    color: #fff !important;
    font-weight: bolder;
  }

  @media(min-width: 992px) {
    .about-team-grids {
      width: 24.6%;
    }
  }

  .w3_agile_header {
    font-weight: bolder;
  }

  .about-team-grids {
    height: 610px;
  }

  .flip-box-inner {
    width: 100%;
    text-align: center;
    transition: transform 0.8s;
    transform-style: preserve-3d;
  }

  .flip-box:hover .flip-box-inner {
    transform: rotateY(180deg);
  }

  .flip-box-front,
  .flip-box-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden !important;
    backface-visibility: hidden !important;
  }

  .flip-box-back {
    transform: rotateY(180deg);
  }
</style>
<!-- breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
      <li>
        <a href="../Main/hfe.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
      </li>
      <li class="active">About</li>
    </ol>
  </div>
</div>
<!-- //breadcrumbs -->
<!-- about -->
<div class="about">
  <div class="container">
    <h3 class="w3_agile_header">About HFE Store</h3>
    <div class="about-agileinfo w3layouts">
      <div class="col-md-8 about-wthree-grids grid-top">
        <h4>Your One-Stop Health & Fitness Equipment Store</h4>
        <p class="top" style="padding:5px">Stay fit from home. We bring the store to your screen.</p>
        <p>Established in 2021, HFE-Store is an eCommerce platform dedicated to providing high-quality health and fitness equipment at your fingertips. We enable users to discover, compare, and order gym essentials with ease, from the comfort of their homes. With 24x7 accessibility, we bring convenience and reliability to your wellness journey.</p>
        <p>Our initiative emerged during the pandemic, recognizing the need for accessible fitness solutions. With disrupted supply chains and closed gyms, HFE-Store aimed to empower individuals and small vendors alike. By connecting fitness-focused buyers with trusted sellers, we promote well-being across communities.</p>
        <p>Through geo-location features, customers can check real-time availability and store status near their locality, either placing orders online or visiting the physical store directly. We believe fitness is for everyone, and our technology ensures it’s always within reach.</p>
        <div class="about-w3agilerow">
          <div class="col-md-12" style="margin: 0px;padding: 0px;">
            <div class="col-md-4 about-w3imgs" style="margin: 0px;padding: 0px;">
              <img src="../../images/logo/store1.png" alt="" class="img-responsive zoom-img" style="height: 147.53px" />
            </div>
            <div class="col-md-4 about-w3imgs" style="margin: 0px;padding: 0px;">
              <img src="../../images/logo/store.jpg" alt="" class="img-responsive zoom-img" style="height: 147.53px" />
            </div>
            <div class="col-md-4 about-w3imgs" style="margin: 0px;padding: 0px;">
              <img src="../../images/logo/login.jpg" alt="" class="img-responsive zoom-img" style="height: 147.53px" />
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="col-md-4 about-wthree-grids">
        <div class="offic-time">
          <div class="time-top">
            <h4>HFE-Store</h4>
          </div>
          <div class="time-bottom">
            <h5>From 9.00 AM</h5>
            <h5>To 9.00 PM</h5>
            <p>Online orders open 24x7</p>
          </div>
        </div>
        <div class="testi">
          <h3 class="w3_agile_header">Testimonials</h3>
          <!--//End-slider-script -->
          <script src="../../js/responsiveslides.min.js"></script>
          <script>
            // You can also use "$(window).load(function() {"
            $(function() {
              // Slideshow 5
              $("#slider5").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function() {
                  $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                  $('.events').append("<li>after event fired.</li>");
                }
              });
            });
          </script>
          <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider5">
              <li>
                <div class="testi-slider">
                  <h4>"Loved the Experience!"</h4>
                  <p>Ordering gym gear was never this smooth. Great UI and fast delivery!</p>
                  <div class="testi-subscript">
                    <p><a href="#">Rahul,</a> Verified Customer</p>
                    <span class="w3-agilesub"> </span>
                  </div>
                </div>
              </li>
              <li>
                <div class="testi-slider">
                  <h4>"Made fitness easy"</h4>
                  <p>Incredible way to shop fitness gear online. Highly recommend!</p>
                  <div class="testi-subscript">
                    <p><a href="#">Priya,</a> Gym Owner</p>
                    <span class="w3-agilesub"> </span>
                  </div>
                </div>
              </li>
              <li>
                <div class="testi-slider">
                  <h4>"Outstanding Support"</h4>
                  <p>Customer service is exceptional. Helped me track my order in real time.</p>
                  <div class="testi-subscript">
                    <p><a href="#">Deepak,</a> Coach</p>
                    <span class="w3-agilesub"> </span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<!-- //about -->
<!-- about-slid -->
<div class="about-slid agileits-w3layouts">
  <div style="background-color: rgba(0,0,0,0.55);">
    <div class="container">
      <div class="about-slid-info">
        <h2>Smart Fitness Shopping Starts Here</h2>
        <p style="text-align:justify">HFE-Store blends modern tech with wellness needs. With seamless search, secure checkout, and real-time availability, we empower individuals to focus on fitness without delay.</p>
      </div>
    </div>
  </div>
</div>
<!-- //about-slid -->
<!-- about-team -->
<div class="about-team">
  <div class="row">
    <h3 class="w3_agile_header">Meet Our Team</h3>
    <div class="team-agileitsinfo">
      <div class="col-md-12">
        <div class="col-md-3 about-team-grids">
          <img src="../../images/team/t1.JPG" alt="" height="450px" />
          <div class="team-w3lstext">
            <h4><span>Govind,</span> Leader</h4>
            <p>Project lead and strategist, ensures smooth execution and team guidance.</p>
          </div>
          <div class="social-icons caption">
            <ul>
              <li><a href="https://www.facebook.com/As.Govind" target="_blank" class="fa fa-facebook facebook"></a>
              </li>
              <li>
                <a href="https://wa.me/[918113990368]?text=Hai%2C%20There!" data-action="share/whatsapp/share" target="_blank" class="fa fa-whatsapp" style="font-size:15px"> </a>
              </li>
              <li>
                <a href="mailto:govind.das279@gmail.com" target="_blank" class="fa fa-envelope mail"></a>
              </li>
            </ul>
            <div class="clearfix"> </div>
          </div>
        </div>
        <div class=" col-md-3 about-team-grids flip-box">
          <div class='flip-box-inner'>
            <div class='flip-box-front'>
              <img src="../../images/team/t2.JPG" alt="" height="450px" />
              <div class="team-w3lstext">
                <h4><span>Anumol,</span> Data Manager</h4>
                <p>Manages data resources and supports backend integration.</p>
              </div>
            </div>
            <div class='flip-box-back'>
              <img src="../../images/team/t5.jpg" alt="" height="450px" />
              <div class="team-w3lstext">
                <h4><span>Dhanalakshmi,</span> Research Analyst</h4>
                <p>Focuses on market and product research.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 about-team-grids">
          <img src="../../images/team/t4.JPG" alt="" height="450px" />
          <div class="team-w3lstext">
            <h4><span>Krishnendu,</span> Co-Leader</h4>
            <p>Assists with technical development and supports project delivery.</p>
          </div>
          <div class="social-icons caption">
            <div class="clearfix"> </div>
          </div>
        </div>
        <div class="col-md-3 about-team-grids">
          <img src="../../images/team/t3.JPG" alt="" height="450px" />
          <div class="team-w3lstext">
            <h4><span>Shahanas,</span> Supervisor</h4>
            <p>Oversees workflow and team coordination.</p>
          </div>
          <div class="social-icons caption">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- //about-team -->
<?php
require "footer.php";
?>
<script type="text/javascript">
  const homeactive = document.querySelector('#homeactive');
  const aboutactive = document.querySelector('#aboutactive');
  const contactactive = document.querySelector('#contactactive');
  homeactive.className = "";
  aboutactive.className = "active";
  contactactive.className = "";
</script>
</body>

</html>