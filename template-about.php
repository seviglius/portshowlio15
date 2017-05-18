
<head><!--added temporarily by galyn while chey and I work concurrently on responsivizing. will combine with responsive.css later today-->
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/css/responsive-about.css">

</head>

<?php

/* Template Name: About Page */

get_header();

?>

<section><!--countdown-->
   <div class="container-fluid about-responsive">
      <div class="row">
        <div class="countdown">
              <div class="col-xs-2 col-sm-4 about-mobile-only"></div>

              <div class="col-xs-3 col-sm-1 column">
                <span class="days"></span>
                    <p class="timeRefDays"></p>
              </div>
              <div class="col-xs-3 col-sm-1 column hour">
                <span class="hours"></span>
                    <p class="timeRefHours"></p>
              </div>
              <div class="col-xs-3 col-sm-1 column minute">
                <span class="minutes"></span>
                    <p class="timeRefMinutes"></p>
              </div>
              <div class="col-xs-3 col-sm-1 column hour">
                <span class="seconds"></span>
                    <p class="timeRefSeconds"></p>
              </div>

              <div class="col-xs-2 col-sm-4 about-mobile-only"></div>

        </div>
    </div> <!--row-->
  </div> <!--container-->
</section><!--countdown-->






<!--
<section class="about_top_dates">
<div class="container-fluid">
  <div class="about_dates_mobile">
          <div class="col-sm-3"></div>
           <div class="col-sm-3 leftside">
              <div class="row-fluid">
                <div class="col-xs-12">
                  <h3 class="about_days pull-right">WEDNESDAY</h3>
              </div>
            </div>
            <div class="row-fluid">
              <div class="col-xs-8 thedate">
                <h6 class="pull-right">JUNE 17 </h6>
              </div>
              <div class="col-xs-4 thetype">
                <p>Professional Reception</p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 rightside">
            <div class="row-fluid">
              <div class="col-xs-12">
                <h3 class="about_days pull-left">THURSDAY</h3>
              </div>
            </div>
            <div class="row-fluid">
              <div class="col-xs-8 col-sm-7 thedate">
                <h6>JUNE 18</h6>
              </div>
              <div class="col-xs-4 col-sm-5 thetype">
                <p>Friends & Family</p>
              </div>
            </div>
          </div>
          <div class="col-sm-3"></div>
        </div> 
      </div>
</section>-->

     <div class="container-fluid" id="about_welcome" >
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-offset-3">
             <div class="about_welcome_text"><?php the_field('welcome_text'); ?></div>
          </div>
          <!--
          <div class="col-xs-0 col-sm-6">
             <div class="pattern"></div>
          </div>
        -->
        </div> <!--row-->
      </div>


<section class=""><!--map -->
 <div class="container-fluid about_add_bot">
   <div class="row">
     <div class="col-xs-12 col-sm-6">
       <div class="about_map">
         <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10758.013830687549!2d-122.321357!3d47.616344!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc1a5c338dd4395c!2sSeattle+Central+College!5e0!3m2!1sen!2sus!4v1432675092485" width="400" height="300" frameborder="0" style="border:0"></iframe>
       </div>
     </div><!--col-->


     <div class="col-xs-12 col-sm-6 about_border">

        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-6 ">
              <h3 class="about_contact"><?php the_field('title');?></h3>
            </div>
          <div class="col-xs-12 about_contact_small">
             <p>1701 BROADWAY, SEATTLE, WA <br> 5TH FLOOR</p>
          </div>

          <div class="col-xs-12 about_info">
              <p class="col-xs-6 col-sm-6" id="outer-center"><?php the_field('phone_number'); ?></p>
              <p class="col-xs-12 col-sm-6" id="outer-center-long"><?php the_field('email'); ?></p>
          </div>
          <div class="col-xs-12 col-sm-6 about-directions">
                <a target="_blank" href="https://www.google.com/maps/place/Seattle+Central+College/@47.616121,-122.3217306,17z/data=!3m1!4b1!4m2!3m1!1s0x54906accc351c149:0xdc1a5c338dd4395c">
                  <span class="about_directions">GET DIRECTIONS
                </a>          
          </div>

        </div>

    </div>



   </div>
 </div>
</section>

<?php get_footer(); ?>

<script>
jQuery( document ).ready(function() {


  // JavaScript Document//Countdown plugin

(function($) {
    $.fn.countdown = function(options, callback) {

      //custom 'this' selector
      var thisEl = $(this);

      //array of custom settings
      var settings = {
        'date': null,
        'format': null
      };

      //append the settings array to options
      if(options) {
        $.extend(settings, options);
      }

      //main countdown function
      var countdown_proc = function () {

        var eventDate = Date.parse(settings['date']) / 1000;
        var currentDate = Math.floor($.now() / 1000);

        if(eventDate <= currentDate) {
          callback.call(this);
          clearInterval(interval);
        };

        var seconds = eventDate - currentDate;

        var days = Math.floor(seconds / (60 * 60 * 24)); //calculate the number of days
        seconds -= days * 60 * 60 * 24; //update the seconds variable with no. of days removed

        var hours = Math.floor(seconds / (60 * 60));
        seconds -= hours * 60 * 60; //update the seconds variable with no. of hours removed

        var minutes = Math.floor(seconds / 60);
        seconds -= minutes * 60; //update the seconds variable with no. of minutes removed

        //conditional Ss
        if (days == 1) { thisEl.find(".timeRefDays").text("Day"); } else { thisEl.find(".timeRefDays").text("Days"); }
        if (hours == 1) { thisEl.find(".timeRefHours").text("Hour"); } else { thisEl.find(".timeRefHours").text("Hours"); }
        if (minutes == 1) { thisEl.find(".timeRefMinutes").text("Minute"); } else { thisEl.find(".timeRefMinutes").text("Minutes"); }
        if (seconds == 1) { thisEl.find(".timeRefSeconds").text("Second"); } else { thisEl.find(".timeRefSeconds").text("Seconds"); }

        //logic for the two_digits ON setting
        if(settings['format'] == "on") {
          days = (String(days).length >= 2) ? days : "0" + days;
          hours = (String(hours).length >= 2) ? hours : "0" + hours;
          minutes = (String(minutes).length >= 2) ? minutes : "0" + minutes;
          seconds = (String(seconds).length >= 2) ? seconds : "0" + seconds;
        }

        //update the countdown's html values.
        if(!isNaN(eventDate)) {
          thisEl.find(".days").text(days);
          thisEl.find(".hours").text(hours);
          thisEl.find(".minutes").text(minutes);
          thisEl.find(".seconds").text(seconds);
        } else {
          alert("Invalid date. Here's an example: 12 Tuesday 2012 17:30:00");
          clearInterval(interval);
        }
      }
      //run the function
      countdown_proc();
      //loop the function
      interval = setInterval(countdown_proc, 1000);
    }
}) (jQuery);

//Call countdown plugin


jQuery(".countdown").countdown({
  date: "17 June 2015 6:19:00", // add the countdown's end date (i.e. 3 november 2012 12:00:00)
  format: "on" // on (03:07:52) | off (3:7:52) - two_digits set to ON maintains layout consistency
},
function() {
  // the code here will run when the countdown ends
  alert("done!")
});

}) (jQuery);
    </script>
