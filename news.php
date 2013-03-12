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

    $limit = 6;   
    
    $news = $obj->ntcGetAll('id', $limit, $pag);
    $count_news = count($news);
    $all_news = $obj->ntcGetTotal();

    $page_id = 2;
    $path_banner = 'images/banners/';
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>La Reina es Colombia - Noticias</title>
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
    <!--  ===============  -->
    <!--  = Header Page =  -->
    <!--  ===============  -->
    <?php include('./includes/page-header.php'); ?>
    
    <div class="title-area">
    	<div class="container">
    		<div class="row">
    			<div class="span10">
    				<h1 class="titlecontent">Noticias</h1>
    			</div>
    			<div class="social-icons">
    				<a target="_blank" href="https://twitter.com/reinasjgomez" class="twitter"><span class="inactive"></span></a>
    				<a target="_blank" href="https://www.facebook.com/pages/REINAS-DE-BELLEZA-JOSE-GOMEZ/144008225672033?ref=ts&fref=ts" class="facebook"><span class="inactive"></span></a>
    				<a target="_blank" href="http://www.youtube.com/user/reinasjgomez?feature=mhee" class="youtube"><span class="inactive"></span></a>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="breadcrumbs-container">
    	<div class="container">
    		<div class="row">
    			<div class="span12">
    				<ul class="breadcrumb">
    					<li><a href="index.php">Inicio</a> <span class="divider"></span></li>
    					<li class="active"><a href="#">Noticias</a></li>
    				</ul>
    			</div>
    		</div>
    	</div>
    </div><!-- /breadcrumbs -->
    
    <div class="main-content">
    	<div class="container">

            <div class="row"><!-- Advertisment -->
                <?php
                    $advers = $obj->getPositionsFromPage($page_id, 'top');
                    $banner_size = $advers ? $obj->sizeImageByType($advers[0]['type']) : array();
                    $class_banner = (empty($advers[0]['url'])) ? 'class = "banner_rectangle"' : 'class = "width : '.$banner_size['width'].'px; height : '.$banner_size['height'].'px; banner_default" style = "margin-left : 30px;"';
                                                                                  
                ?>            
                <div <?php echo $class_banner ?>>
                    <?php if(!empty($advers[0]['url'])): ?>
                    <img src="<?php echo $path_banner.$advers[0]['url']; ?>" width=<?php echo $banner_size['width']; ?> height=<?php echo $banner_size['height']; ?> />
                    <?php endif ?>
                </div>
            </div><!-- /Advertisment -->

    		<div class="row">
    			<div class="span9 width-news-detail">
    				<div class="row">
    					<?php
                        $i = 1;
                        foreach ($news as $nw) {                                
                        ?>                    
    					<div class="span9 width-news-detail">
    						<div class="lined">
		    					<h2><?php echo $nw['NewsTitle'] ?></h2>
		    					<div class="meta-data">
		    						<?php echo f_fecha($nw['dateAdd']) ?>
								</div>
		    					<span class="bolded-line"></span>
		    				</div>
		    				<p><?php echo $nw['NewsPreview_br'] ?></p>
							<p><a href="detail-news.php?id=<?php echo $nw['NewsId'] ?>" class="btn btn-theme no-bevel">Leer Mas</a></p>
    					</div><!-- /blogpost -->
    					<?php if ($i != $count_news) { ?>
    					<div class="span9 width-news-detail">
		    				<div class="divide-line">
		    					<div class="icon icons-scissors"></div>
		    				</div>
		    			</div>                           					
    					<?php 
                            $i++;
                            }
                        } ?>
                        <?php 
                           if($all_news > $limit){
                               $total_pag = ceil(($all_news / $limit));
                               $width_ul = $total_pag * 20;
                       ?>
                       <div class="news_pagination">
                           <ul style="width : <?php echo $width_ul; ?>px;">                                
                               <?php                                
                               for ($i = 1; $i <= $total_pag ; $i++) { 
                                   $link_page = ($pag == $i) ? $i : "<a href='news.php?pag=$i'>$i</a>" ;                               
                               ?>
                               <li><?php echo $link_page ?></li>
                               <?php } ?>
                           </ul>
                       </div>
                       <?php } ?>
    				</div>
    			</div><!-- /blog -->
    			
    			<!-- Advertisment -->
              <div class="span4 cont_adv_width">
                    <?php
                        $advers = $obj->getPositionsFromPage($page_id, 'right');
                        $banner_size = $obj->sizeImageByType($advers[0]['type']);
                        $class_banner = (empty($advers[0]['url'])) ? 'class = "banner_square"' : 'class = "banner_default" style = "width : '.$banner_size['width'].'px; height : '.$banner_size['height'].'px;"';                                                                 
                    ?>
                    <div <?php echo $class_banner ?>>
                        <?php if(!empty($advers[0]['url'])): ?>
                        <img src="<?php echo $path_banner.$advers[0]['url']; ?>" width=<?php echo $banner_size['width']; ?> height=<?php echo $banner_size['height']; ?> />
                        <?php endif ?>
                    </div>                
              </div><!-- /Advertisment -->
    			
    		</div><!-- / -->
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
