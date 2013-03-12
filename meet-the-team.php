<?php 
    // Database
    require('./includes/conect.php');
    // Global functions
    require('./includes/global.php');
    
    // Classes
    require('./classes/class.all.php');
    
    $obj = new All();

    $pag = 1;
    if(isset($_GET['pag']))
        $pag = $_GET['pag'];   

    $page_id = 3;
    $path_banner = 'images/banners/';
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <meta charset="utf-8">
    <style>
    .js #features {
        margin-left: -12000px; width: 100%;
    }

    </style>
    <!-- = Wow Book - Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Hairpress, HTML template - Meet the Team</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusNet d.o.o.">

    <!-- = Wow Book - Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
    <!--  = Wow Book CSS : implied media="all" =  -->
    <link rel="stylesheet" href="stylesheets/wow_book/style.css?v=2">
    <link rel="stylesheet" href="./wow_book/wow_book.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/wow_book/preview.css">
    <script src="./js/wow_book/mylibs/less-1.0.41.min.js" type="text/javascript"></script>

    <!-- = Wow Book - Uncomment if you are specifically targeting less enabled mobile browsers
    <link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

    <link href='http://fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'> 
    <!-- = Wow Book CSS All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->

    <script src="js/wow_book/libs/modernizr-1.6.min.js"></script>


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
    <!--  ===============  -->
    <!--  = Header Page =  -->
    <!--  ===============  -->
    <?php include('./includes/page-header.php'); ?>
    
    <div class="title-area">
    	<div class="container">            
    		<div class="row">
    			<div class="span10">
    				<h1>La Revista</h1>
    			</div>
    			<div class="social-icons">
    				<a href="#" class="twitter"><span class="inactive"></span></a>
    				<a href="#" class="facebook"><span class="inactive"></span></a>
    				<a href="#" class="youtube"><span class="inactive"></span></a>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="breadcrumbs-container">
    	<div class="container">
    		<div class="row">
    			<div class="span12">
    				<ul class="breadcrumb">
    					<!-- <li><a href="index.html">Home Page</a> <span class="divider"></span></li>
    					<li class="active"><a href="meet-the-team.html">Meet the Team</a></li> -->
    				</ul>
    			</div>
    		</div>
    	</div>
    </div><!-- /breadcrumbs -->
    
    <div class="main-content">
    	<div class="container">
            <div class="row"><!-- Advertisment -->
                <?php
                    $advers = $obj->getPositionsFromPage($page_id);
                    $banner_size = $obj->sizeImageByType($advers[0]['type']);                                       
                    $class_banner = (empty($advers[0]['url'])) ? 'class = "banner_rectangle"' : 'class = "banner_default" style = "width : '.$banner_size['width'].'px; height : '.$banner_size['height'].'px; margin-left : 30px; display : inline-block"';                                                             
                ?>            
                <div <?php echo $class_banner ?> style='display:inline-block'>
                    <?php if(!empty($advers[0]['url'])): ?>
                    <img src="<?php echo $path_banner.$advers[0]['url']; ?>" width=<?php echo $banner_size['width']; ?> height=<?php echo $banner_size['height']; ?> />
                    <?php endif ?>
                </div>
                <?php
                    $banner_size = $obj->sizeImageByType($advers[1]['type']);                                       
                    $class_banner = (empty($advers[1]['url'])) ? 'class = "banner_rectangle_short"' : 'class = "banner_default" style = "width : '.$banner_size['width'].'px; height : '.$banner_size['height'].'px; ;margin-left : 30px; display:inline-block"';                                                             
                ?>
                <div <?php echo $class_banner ?> style='display:inline-block'>
                    <?php if(!empty($advers[1]['url'])): ?>
                    <img src="<?php echo $path_banner.$advers[1]['url']; ?>" width=<?php echo $banner_size['width']; ?> height=<?php echo $banner_size['height']; ?> />
                    <?php endif ?>
                </div>
            </div><!-- /Advertisment -->
        	<div style='margin-top:30px;'>	
            	<nav class="wowbook">
                    <ul>
                        <li><a id='first'     href="#" title='goto first page'   >First page</a></li>
                        <li><a id='back'      href="#" title='go back one page'  >Back</a></li>

                        <li><a id='next'      href="#" title='go foward one page'>Next</a></li>
                        <li><a id='last'      href="#" title='goto last page'    >last page</a></li>
                        <li><a id='zoomin'    href="#" title='zoom in'           >Zoom In</a></li>
                        <li><a id='zoomout'   href="#" title='zoom out'          >Zoom Out</a></li>
                        <li><a id='slideshow' href="#" title='start slideshow'   >Slide Show</a></li>
                    </ul>

                </nav>
                <!-- ========== -->
                <!-- = Wow Book -->
                <!-- ========== -->
                <div id="main" style='margin-top:30px;'>
                    <img id='click_to_open' src="images/wow_book/click_to_open.png" alt='click to open' />
                    <div id='features'>
                        <div id='cover'>
                        </div>

                        <div class='feature page1'>               
                        </div>

                        <div class='feature page2'>               
                        </div>

                        <div class='feature page3'>               
                        </div>

                        <div class='feature page4'>               
                        </div>

                        <div class='feature page5'>               
                        </div>

                        <div class='feature page6'>               
                        </div>

                        <div class='feature page7'>               
                        </div>

                        <div class='feature page8'>               
                        </div>

                        <div class='feature page9'>               
                        </div>

                        <div class='feature page10'>               
                        </div>

                        <div class='feature page11'>               
                        </div>

                        <div class='feature page12'>               
                        </div>

                        <div class='feature page13'>               
                        </div>

                        <div class='feature page14'>               
                        </div>

                        <div class='feature page15'>               
                        </div>            

                    </div> <!-- features -->

                </div>
                <!-- ========== -->
                <!-- = End Wow Book -->
                <!-- ========== -->
            </div>
    		
    		<div class="row">
				<div class="span12">
					<div class="divide-line">
						<span class="icon icons-scissors"></span>
					</div>
				</div>
    		</div><!-- /divider -->   		
	        
	        <div class="row">
	            <div class="span12">
	                <!-- <div class="brands">
	                	<a href="#"><img src="images/brand_01.jpg" alt="" width="93" height="55" /></a>
	                	<a href="#"><img src="images/brand_02.jpg" alt="" width="202" height="55" /></a>
	                	<a href="#"><img src="images/brand_03.jpg" alt="" width="202" height="55" /></a>
	                	<a href="#"><img src="images/brand_04.jpg" alt="" width="169" height="55" /></a>
	                	<a href="#"><img src="images/brand_05.jpg" alt="" width="184" height="55" /></a>
	                </div> -->
	            </div>
	        </div>
    		
    	</div><!-- /container -->
    </div>
    
    
    <!--  ===============  -->
    <!--  = Footer Page =  -->
    <!--  ===============  -->
    <?php include('./includes/page-footer.php'); ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--  ========================================  -->
    <!--  = Uncomment the JS components you need =  -->
    <!--  ========================================  -->
    <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
    <script type="text/javascript" src="./js/wow_book/libs/jquery-1.7.1.min.js"></script>

    <sscript src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></sscript>
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


    <!--  ==========  -->
    <!--  = Wow Book JS =  -->
    <!--  ==========  -->
    <script>// !window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
    <script type="text/javascript" src="./wow_book/wow_book.min.js"></script>
    <style>
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#features').wowBook({
                 height : 614
                ,width  : 900
                ,centeredWhenClosed : true
                ,hardcovers : true
                ,turnPageDuration : 1000
                ,numberedPages : [1,-2]
                ,transparentPages : true
                ,controls : {
                        zoomIn    : '#zoomin',
                        zoomOut   : '#zoomout',
                        next      : '#next',
                        back      : '#back',
                        first     : '#first',
                        last      : '#last',
                        slideShow : '#slideshow'
                    },
            }).css({'display':'none', 'margin':'auto'}).fadeIn(1000);

            $("#cover").click(function(){
                $.wowBook("#features").advance();
            });
        });
    </script>

    <!-- scripts concatenated and minified via ant build script-->

    <script src="js/wow_book/plugins.js"></script>
    <script src="js/wow_book/script.js"></script>
    <!-- end concatenated and minified scripts-->

    <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
    <![endif]-->

    <!--  ==========  -->
    <!--  = End Wow Book JS =  -->
    <!--  ==========  -->

  </body>
</html>
