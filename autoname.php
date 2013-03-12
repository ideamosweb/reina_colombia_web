<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>Hairpress, HTML template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusNet d.o.o.">


	<!--  ================  --> 
	<!--  = Google Fonts =  -->
	<!--  ================  -->
	
	<!--  = Body fonts =  -->
	<link href='http://fonts.googleapis.com/css_family=PT+Sans:400,700.html' rel='stylesheet' type='text/css'>
	<!--  = Logo Font =  -->
	<link href='http://fonts.googleapis.com/css_family=Lobster.html' rel='stylesheet' type='text/css'>
	
	
	<!--  ===================  -->
	<!--  = CSS stylesheets =  -->
	<!--  ===================  -->
	
	<!--  = Twitter Bootstrap =  -->
    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <!--  = Responsiveness =  -->
    <link rel="stylesheet" href="stylesheets/responsive.css" type="text/css" media="screen" title="no title" />
    <!--  = Custom styles =  -->
    <link rel="stylesheet" href="stylesheets/main.css" />
    <!--  = Revolution Slider =  -->
    <link rel="stylesheet" href="js/rs-plugin/css/settings.css" type="text/css" media="screen" />
    <!--  = LightBox2 =  -->
    <link rel="stylesheet" href="js/lightbox/css/lightbox.css" type="text/css" media="screen" />


	<!--  ===================================================  -->
	<!--  = HTML5 shim, for IE6-8 support of HTML5 elements =  -->
	<!--  ===================================================  -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Fav icon -->
    <link rel="shortcut icon" href="favicon.ico">
  </head>

  <body>
    <header>
    	<div class="navbar navbar-inverse navbar-fixed-top">
    	  <div class="navbar-inner">
    	    <div class="container">
    	      <!--  =========================================  -->
			  <!--  = Used for showing navigation on mobile =  -->
			  <!--  =========================================  -->
    	      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    	        <span class="icon-bar"></span>
    	        <span class="icon-bar"></span>
    	        <span class="icon-bar"></span>
    	      </a>
    	      
    	      <!--  ==============================  -->
			  <!--  = Place for logo and tagline =  -->
			  <!--  ==============================  -->
    	      <a class="brand" href="index.html">
    	      	<img src="images/scissors.png" alt="HairPress Logo" width="48" height="53" class="logo" />
    	      	<h1>    	      		hair<span class="theme-clr">press</span>
    	      	</h1>
    	      	<span class="tagline">Template for Hairsalons</span>
	      	  </a>
	      	  
	      	  <!--  =============================================  -->
		      <!--  = Main top navigation with drop-drown menus =  -->
			  <!--  =============================================  -->
    	      <div class="nav-collapse collapse">
    	        <ul class="nav">
    	          <li class="active"><a href="index.html">Home</a></li>
    	          <li class="dropdown">
    	          	<a href="services-pricing.html" class="dropdown-toggle">Services&amp;Pricing</a>
    	          	<ul class="dropdown-menu">
    	              <li><a href="features.html">Features of the theme</a></li>
    	              <li><a href="pricing.html">Our Prices</a></li>
    	              <li><a href="#">Something else here</a></li>
    	            </ul>
    	          </li>
    	          <li><a href="meet-the-team.html">Meet the team</a></li>
    	          <li><a href="gallery.html">Gallery</a></li>
    	          <li><a href="blog.html">Blog</a></li>    	          <li><a href="contact.html">Contact us</a></li>
    	        </ul>
    	        <a href="make-an-appointment.html" class="btn btn-theme btn-large pull-right">Make an appointment</a>
	          </div><!-- /.nav-collapse-->
	        </div>
	      </div>
	    </div>
    </header>
    
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <ul>
             <li data-transition="random" data-slotamount="7">
               <img src="images/slider/slider-1.jpg" width="1500" height="530" data-fullwidthcentering="on" alt="" />
               <div class="custom-cap">WE TRULY BELIEVE HAIRCUT MATTERS</div>
             </li>
             <li data-transition="random" data-slotamount="7">
               <img src="images/slider/slider-2.jpg" width="1500" height="530" data-fullwidthcentering="on" alt="" />
               <div class="custom-cap">THIS IS MY REALLY LONG CAPTION</div>
             </li>
             <li data-transition="random" data-slotamount="7">
               <img src="images/slider/slider-3.jpg" width="1500" height="530" data-fullwidthcentering="on" alt="" />
               <div class="custom-cap">YET ANOTHER CAPTION</div>
             </li>
             <li data-transition="random" data-slotamount="7">
               <img src="images/slider/slider-4.jpg" width="1500" height="530" data-fullwidthcentering="on" alt="" />
               <div class="custom-cap">SHORT CAPTION</div>
             </li>
             <li data-transition="random" data-slotamount="7">
               <img src="images/slider/slider-5.jpg" width="1500" height="530" data-fullwidthcentering="on" alt="" />
               <div class="custom-cap">AND NAILS INDEED</div>
             </li>
             <li data-transition="random" data-slotamount="7">
               <img src="images/slider/slider-6.jpg" width="1500" height="530" data-fullwidthcentering="on" alt="" />
               <div class="custom-cap">THIS IS THE LAST SLIDE</div>
             </li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="span9">
                    <div class="slider-title">
                        <div class="icon icons-double-line"></div>
                        <div class="semi-white-bg" id="custom-caption-container">
                            
                        </div>
                        <div class="icon icons-double-line"></div>
                        <nav class="nav-icons">
                            <a href="#" class="icon icons-slider-nav-left" id="slider-nav-left"></a>
                            <a href="#" class="icon icons-slider-nav-right" id="slider-nav-right"></a>
                        </nav>
                        
                    </div>
                </div>
                <div class="span3">
                    <div class="opening-time">
                        <div class="time-table">
                            <h3><span class="icon icons-ornament-left"></span> <span class="light">OPENING</span> TIME <span class="icon icons-ornament-right"></span></h3>
                            <div class="inner-bg">
                                <dl class="week-day">
                                    <dt>Monday</dt>
                                    <dd>9:00-18:00</dd>
                                </dl>
                                <dl class="week-day light-bg">
                                    <dt>Tuesday</dt>
                                    <dd>9:00-18:00</dd>
                                </dl>
                                <dl class="week-day today">
                                    <dt>Wednesday</dt>
                                    <dd>8:00-18:00</dd>
                                </dl>
                                <dl class="week-day light-bg">
                                    <dt>Thursday</dt>
                                    <dd>9:00-18:00</dd>
                                </dl>
                                <dl class="week-day">
                                    <dt>Friday</dt>
                                    <dd>9:00-18:00</dd>
                                </dl>
                                <dl class="week-day light-bg">
                                    <dt>Saturday</dt>
                                    <dd>9:00-18:00</dd>
                                </dl>
                                <dl class="week-day closed">
                                    <dt>Sunday</dt>
                                    <dd>CLOSED</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-icons">
                    <a href="#" class="twitter"><span class="inactive"></span></a>
                    <a href="#" class="facebook"><span class="inactive"></span></a>
                    <a href="#" class="youtube"><span class="inactive"></span></a>
                </div>
            </div>
        </div>
    </div>

    
    <div class="main-content">
    	<div class="container">
    	
    	  <div class="row">
    	      
    	      <article class="span3"><!-- our services -->
    	          <div class="lined">
    	              <h2><a href="services-pricing.html"><span class="light">AMAZING</span> SLIDER</a></h2>
    	              <h5>What we do for you</h5>
    	              <span class="bolded-line"></span>
    	          </div>
    	          <p>Together with the Hairpress HTML template comes the <a href="http://codecanyon.net/item/slider-revolution-responsive-jquery-plugin/2580848_ref=proteusnet.html">Slider Revolution</a>, premium JavaScript slider, worth $12 alone!</p>
    	          <p>There are many other features this template offers, just check out the <a href="features.html">features page</a>.</p>
    	      </article><!-- /our services -->
    	      
    	      <article class="span3"><!-- service -->
    	          <div class="picture">
    	              <a href="services-pricing.html">
    	                  <img src="images/services-1.jpg" alt="" width="215" height="137" />
    	              	  <span class="img-overlay">
    	              	     <span class="btn btn-inverse">Read more</span>
    	              	  </span>
    	          	  </a>
    	          </div>
    	          <div>
    	          	<h3 class="size-16">Creativity is our second name</h3>
    	          	<span class="bolded-line"></span>
    	          </div>
    	          <p>Placerat dapibus. Etiam ultrices nulla sed leo malesuada commodo bibendum orci vi verra. Sed rutrum dapibus feugiat. Iasellus et congue arcu.</p>
    	          <a href="services-pricing.html" class="read-more">READ MORE -</a>
    	      </article><!-- /service -->
    	      
    	      <article class="span3"><!-- service -->
    	          <div class="picture">
    	              <a href="services-pricing.html">
    	                  <img src="images/services-2.jpg" alt="" width="215" height="137" />
    	              	  <span class="img-overlay">
    	              	     <span class="btn btn-inverse">Read more</span>
    	              	  </span>
    	          	  </a>
    	          </div>
    	          <div>
    	          	<h3 class="size-16">We care about your skin too</h3>
    	          	<span class="bolded-line"></span>
    	          </div>
    	          <p>Placerat dapibus. Etiam ultrices nulla sed leo malesuada commodo bibendum orci vi verra. Sed rutrum dapibus feugiat. Iasellus et congue arcu.</p>
    	          <a href="services-pricing.html" class="read-more">READ MORE -</a>
    	      </article><!-- /service -->
    	      
    	      <article class="span3"><!-- service -->
    	          <div class="picture">
    	              <a href="services-pricing.html">
    	                  <img src="images/services-3.jpg" alt="" width="215" height="137" />
    	              	  <span class="img-overlay">
    	              	     <span class="btn btn-inverse">Read more</span>
    	              	  </span>
    	          	  </a>
    	          </div>
    	          <div>
    	          	<h3 class="size-16">And nails indeed</h3>
    	          	<span class="bolded-line"></span>
    	          </div>
    	          <p>Placerat dapibus. Etiam ultrices nulla sed leo malesuada commodo bibendum orci vi verra. Sed rutrum dapibus feugiat. Iasellus et congue arcu.</p>
    	          <a href="services-pricing.html" class="read-more">READ MORE -</a>
    	      </article><!-- /service -->
    	      
    	  </div><!-- /services -->
    	  
    	  <div class="row">
    	      <div class="span12">
    	          <div class="divide-line">
    	              <div class="icon icons-scissors"></div>
    	          </div>
    	      </div>
    	  </div>
    	  
    	  <div class="row">
    	      
    	      <div class="span6"><!-- latest news -->
    	          <div class="lined">
    	              <a href="blog.html" class="btn btn-theme pull-right no-bevel">VIEW ALL</a>
    	              <h2><a href="blog.html"><span class="light">LATEST</span> NEWS</a></h2>
    	              <h5>What is going on</h5>
    	              <span class="bolded-line"></span>
    	          </div>
    	          <div class="row">
    	              <article class="span3">
    	                  <h3 class="no-margin">Creativity is our second name</h3>
    	                  <div class="meta-info">
    	                      <span class="date">21. OCTOBER 2012</span>
    	                  </div>
    	                  <p>Placerat dapibus. Etiam ultrices nulla sed leo malesuada commodo bibendum orci vi verra. Sed rutrum dapibus feugiat. Iasellus et congue arcu. Sed rutrum dapibus feugiat. Iasellus et congue arcu. Sed rutrum dapibus feugiat. Iasellus et congue arcu. Sed rutrum</p>
    	                  <a href="blog.html" class="read-more">READ MORE -</a>
    	              </article>
    	              <article class="span3">
    	                  <h3 class="no-margin">Creativity is our second name</h3>
    	                  <div class="meta-info">
    	                      <span class="date">21. OCTOBER 2012</span>
    	                  </div>
    	                  <p>Placerat dapibus. Etiam ultrices nulla sed leo malesuada commodo bibendum orci vi verra. Sed rutrum dapibus feugiat. Iasellus et congue arcu. Sed rutrum dapibus feugiat. Iasellus et congue arcu. Sed rutrum dapibus feugiat. Iasellus et congue arcu. Sed rutrum</p>
    	                  <a href="blog.html" class="read-more">READ MORE -</a>
    	              </article>
    	          </div>
    	      </div><!-- /latest news -->
    	      
    	      <div class="span3 hidden-phone"><!-- gallery -->
    	          <div class="lined">
    	              <nav class="arrows pull-right">
    	                  <a href="#" class="nav-left icon icons-arrow-left"></a>
    	                  <a href="#" class="nav-right icon icons-arrow-right"></a>
    	              </nav>
    	              <h2><a href="gallery.html">GALLERY</a></h2>
    	              <h5>Cutting edge hairstyle</h5>
    	              <span class="bolded-line"></span>
    	          </div>
    	          <div class="carousel">
    	          	<div class="slide">
    	          		<ul class="thumbnails">
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-1.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-2.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-3.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-4.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-5.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-6.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-7.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-8.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-9.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		</ul>
    	          	</div><!-- /slide -->
    	          	<div class="slide">
    	          		<ul class="thumbnails">
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-1.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-2.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-3.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-4.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-5.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-6.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-7.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-8.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		    <li class="span1 picture">
    	          		        <a href="gallery.html">
    	          		            <img src="images/gallery/gallery-9.png" alt="" width="70" height="70" />
    	          		            <span class="img-overlay">
    	          		                <span class="icon icons-zoom"></span>
    	          		            </span>
    	          		        </a>
    	          		    </li>
    	          		</ul>
    	          	</div><!-- /slide -->
    	          </div><!-- /carousel -->
    	      </div><!-- /gallery -->
    	      
    	      <div class="span3"><!-- testimonials -->
    	          <div class="lined">
    	              <nav class="arrows pull-right">
    	                  <a href="#" class="nav-left icon icons-arrow-left"></a>
    	                  <a href="#" class="nav-right icon icons-arrow-right"></a>
    	              </nav>
    	              <h2>TESTIMONIALS</h2>
    	              <h5>What others said about us</h5>
    	              <span class="bolded-line"></span>
    	          </div>
    	          <div class="carousel">
    	          	<div class="slide">
    	          		<div class="quote">
    	          			<blockquote>
    	          			    <p>Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo...</p>
    	          			</blockquote>
    	          			<div class="author">
    	          			    <div class="person theme-clr">JOHN DOE</div>
    	          			    <div class="title">Movie Superstar</div>
    	          			</div>
    	          		</div>
    	          	</div>
    	          	<div class="slide">
    	          		<div class="quote">
    	          			<blockquote>
    	          			    <p>It is really bad that I am bold already, I would love to be cut in this hairsalon...</p>
    	          			</blockquote>
    	          			<div class="author">
    	          			    <div class="person theme-clr">BRUCE WILLIS</div>
    	          			    <div class="title">The best actor</div>
    	          			</div>
    	          		</div>
    	          	</div>
    	          </div>
    	      </div><!-- /testimonials -->
    	      
    	  </div><!-- /row -->
    	  
    	</div>
    </div> <!-- /container -->
    
    <div class="dark-stripe">
        <div class="container">
            <div class="row">
                
                <div class="span12">
                    <div class="lined">
                    	<h2>
                    		<a href="#" class="nav-left icon icons-arrow-left-white"></a>
                    		<a href="meet-the-team.html"><span class="light">MEET THE</span> TEAM</a>
                    		<a href="#" class="nav-right icon icons-arrow-right-white"></a>
                    	</h2>
                    	<h5>Who works for us</h5>
                    	<span class="bolded-line"></span>
                    </div>
                    <div class="carousel carousel-wide">
                    	<div class="slide">
                    		<ul class="thumbnails">
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-1">
                    		                <img src="images/team/team-1.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">MARY SMITH</h4>
                    		                                <p class="title no-margin">CEO</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-2">
                    		                <img src="images/team/team-2.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">PATRICIA JOHNSON</h4>
                    		                                <p class="title no-margin">Professional Hairstylist</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-3">
                    		                <img src="images/team/team-3.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">JAMES WILLIAMS</h4>
                    		                                <p class="title no-margin">Professional Hairstylist</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-4">
                    		                <img src="images/team/team-4.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">LINDA JONES</h4>
                    		                                <p class="title no-margin">Marketing &amp; Promotion</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-5">
                    		                <img src="images/team/team-5.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">BARBARA BROWN</h4>
                    		                                <p class="title no-margin">Professional Hairstylist</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-6">
                    		                <img src="images/team/team-6.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">ELIZABETH DAVIS</h4>
                    		                                <p class="title no-margin">Professional Hairstylist</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		</ul>
                    	</div><!-- /slide -->
                    	<div class="slide">
                    		<ul class="thumbnails">
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-1">
                    		                <img src="images/team/team-1.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">MARY SMITH</h4>
                    		                                <p class="title no-margin">CEO</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-2">
                    		                <img src="images/team/team-2.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">PATRICIA JOHNSON</h4>
                    		                                <p class="title no-margin">Professional Hairstylist</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-3">
                    		                <img src="images/team/team-3.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">JAMES WILLIAMS</h4>
                    		                                <p class="title no-margin">Professional Hairstylist</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-4">
                    		                <img src="images/team/team-4.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">LINDA JONES</h4>
                    		                                <p class="title no-margin">Marketing &amp; Promotion</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-5">
                    		                <img src="images/team/team-5.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">BARBARA BROWN</h4>
                    		                                <p class="title no-margin">Professional Hairstylist</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		    <li class="span2"><!-- team member -->
                    		        <div class="picture hidden-phone">
                    		            <a href="meet-the-team.html#team-member-6">
                    		                <img src="images/team/team-6.png" alt="" width="170" height="233" class="grayscale-img" /><!-- just add .grayscale-img to the image for grayscale version -->
                    		                <span class="shine-overlay"></span>
                    		            </a>
                    		        </div>
                    		        <div class="caption">
                    		                                <h4 class="theme-clr">ELIZABETH DAVIS</h4>
                    		                                <p class="title no-margin">Professional Hairstylist</p>
                    		                            </div>
                    		    </li><!-- /team member -->
                    		    
                    		</ul>
                    	</div><!-- /slide -->
                    </div>
                </div>
                
                    
                
            </div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /dark-stripe -->
    
    <div class="container">
        
        <div class="row"><!-- about us -->
            <div class="span12">
                <div class="lined">
                    <a href="contact.html" class="btn btn-theme pull-right no-bevel">READ WHOLE STORY</a>
                    <h2><a href="contact.html"><span class="light">ABOUT</span> US</a></h2>
                    <h5>Our interesting story</h5>
                    <span class="bolded-line"></span>
                </div>
                <div class="row">
                    <div class="span4">
                        <p>Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo malesuada commodo bibendum orci vi verra. Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo malesuada commodo bibendum orci vi verra. Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo malesuada commodo bibendum orci vi verra.</p>
                    </div>
                    <div class="span4">
                        <p>Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo malesuada commodo bibendum orci vi verra. Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo malesuada commodo bibendum orci vi verra. Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo malesuada commodo bibendum orci vi verra.</p>
                    </div>
                    <div class="span4">
                        <p>Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo malesuada commodo bibendum orci vi verra. Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo malesuada commodo bibendum orci vi verra. Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque. Morbi cilisis placerat dapibus. Etiam ultrices nulla ed leo malesuada commodo bibendum orci vi verra.</p>
                    </div>
                </div>
            </div>
        </div><!-- /about us -->
        
        <div class="row">
            <div class="span12">
                <div class="divide-line">
                    <div class="icon icons-scissors"></div>
                </div>
            </div>
        </div>
        
        <div class="row"><!-- brands -->
            <div class="span12">
                <div class="brands">
                	<a href="#"><img src="images/brand_01.jpg" alt="" width="93" height="55" /></a>
                	<a href="#"><img src="images/brand_02.jpg" alt="" width="202" height="55" /></a>
                	<a href="#"><img src="images/brand_03.jpg" alt="" width="202" height="55" /></a>
                	<a href="#"><img src="images/brand_04.jpg" alt="" width="169" height="55" /></a>
                	<a href="#"><img src="images/brand_05.jpg" alt="" width="184" height="55" /></a>
                </div>
            </div>
        </div><!-- /brands -->
        
    </div> <!-- /container -->
    
    <div class="foot">
        <div class="container">
            
            <div class="row">
                <div class="span3">
            	    <div class="lined">
            	        <h2>NAVIGATION</h2>
            	        <h5>If you don't find it above</h5>
            	        <span class="bolded-line"></span>
            	    </div>
            	    <nav>
            	        <ul class="nav nav-pills nav-stacked">
            	            <li><a href="index.html">Home</a></li>
            	            <li><a href="services-pricing.html">Services &amp; Pricing</a></li>
            	            <li><a href="meet-the-team.html">Meet the team</a></li>
            	            <li><a href="gallery.html">Gallery</a></li>
            	            <li><a href="blog.html">Blog</a></li>
            	            <li><a href="contact.html">Contact us</a></li>
            	            <li><a href="make-an-appointment.html">Make an appointment</a></li>
            	        </ul>
            	    </nav>
            	</div><!-- /navigavation -->
            	
            	<div class="span3">
            	    <div class="lined">
            	        <h2>FACEBOOK</h2>
            	        <h5>Find us on Facebook</h5>
            	        <span class="bolded-line"></span>
            	    </div>
            	    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=317322608312190";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
            	    <div class="fb-like-box" data-href="http://www.facebook.com/platform" data-width="220" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-border-color="#aaaaaa" data-header="false"></div>
            	</div><!-- /facebook -->
            	
            	<div class="span3">
            	    <div class="lined">
            	        <!-- <nav class="arrows pull-right">
            	            <a href="#" class="left icon icons-arrow-left-white"></a>
            	            <a href="#" class="right icon icons-arrow-right-white"></a>
            	        </nav> -->
            	        <h2>TWITTER</h2>
            	        <h5>Latest tweets</h5>
            	        <span class="bolded-line"></span>
            	    </div>
            	    <div class="tweet-container"></div>
            	</div><!-- /navigavation -->
            	
            	<div class="span3">
            	    <div class="lined">
            	        <h2>CONTACT US</h2>
            	        <h5>Where the hell we are</h5>
            	        <span class="bolded-line"></span>
            	    </div>
            	    <p>
            	        <strong>Hairpress Saloon</strong> <br />
                        World Financial Center <br />
                        New York, NY 10080, <br />
                        United States <br />
                        <a href="#" class="read-more">VIEW MAP -</a>
                    </p>
                    <div class="bolded-line"></div>
                    <p>
                        Phone: <strong>(516) 565-9700</strong> <br />
                        Fax: <strong>(516) 565-9701</strong> <br />
                        Mail: <strong>info@hairpress.com</strong> <br />
                        Web: <strong>www.hairpress.com</strong>
                    </p>
            	</div><!-- /navigavation -->
            	
        	</div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /foot -->
    
    <footer>
        <a href="#" id="to-the-top">
            <span class="icon icons-to-top-arrow"></span>
        </a>
        <div class="container">
        	<div class="row">
        		<div class="span6">
        		    &copy; Copyright 2013. Powered by <a href="http://wordpress.org">Wordpress</a>, LightBox2 by Lokesh Dhakar | <a href="http://lokeshdhakar.com/">lokeshdhakar.com</a>
    		    </div>
        		<div class="span6">
        		    <div class="pull-right">Hairpress Theme by <a href="http://www.proteusnet.com">ProteusNet</a></div>
    		    </div>
        	</div>
        </div>
    </footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--  ========================================  -->
    <!--  = Uncomment the JS components you need =  -->
    <!--  ========================================  -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <!-- <script src="js/bootstrap-alert.js"></script> -->
    <!-- <script src="js/bootstrap-modal.js"></script> -->
    <!-- <script src="js/bootstrap-dropdown.js"></script> -->
    <!-- <script src="js/bootstrap-scrollspy.js"></script> -->
    <script src="js/bootstrap-tab.js"></script>
    <!-- <script src="js/bootstrap-tooltip.js"></script> -->
    <!-- <script src="js/bootstrap-popover.js"></script> -->
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <!-- <script src="js/bootstrap-carousel.js"></script> -->
    <!-- <script src="js/bootstrap-typeahead.js"></script> -->
    
    
    <!--  ==========  -->
    <!--  = Tweet jQuery plugin for Twitter stream =  -->
    <!--  ==========  -->
    <script src="js/jquery.tweet.js" type="text/javascript" charset="utf-8"></script>
    
    <!--  ==========  -->
    <!--  = Carousel jQuery plugin =  -->
    <!--  ==========  -->
    <script src="js/jquery.carouFredSel-6.1.0-packed.js" type="text/javascript" charset="utf-8"></script>
    
    <!--  ==========  -->
    <!--  = Revolution Slider =  -->
    <!--  ==========  -->
    <script src="js/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript" charset="utf-8"></script>
    
    <!--  ==========  -->
    <!--  = LightBox =  -->
    <!--  ==========  -->
    <script src="js/lightbox/js/lightbox.js" charset="utf-8"></script>
    
    <!--  ==========  -->
    <!--  = Custom JS =  -->
    <!--  ==========  -->
    <script src="js/custom.js" type="text/javascript" charset="utf-8"></script>

  </body>
</html>
