<?php 
    // Database
    require('./includes/conect.php');
    // Global functions
    require('./includes/global.php');
    
    // Classes
    require('./classes/class.all.php');
    
    $obj = new All();   
    
    $news = $obj->ntcGetAll('id', 4);
    $count_news = count($news);

    $page_id = 1;
    $path_banner = 'images/banners/';    
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>La Reina es Colombia, by José Gómez</title>
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
    
    <!--  ==========================  -->
    <!--  = Full width PAge slider =  -->
    <!--  ==========================  -->
    <?php include('./includes/page-slider.php'); ?>
    
    <div class="main-content">
    	<div class="container">    	  
    	  <div class="row">
    	      
    	      <div class="span6"><!-- latest news -->
    	          <div class="lined">
    	              <a href="news.php" class="btn btn-theme pull-right no-bevel">VER TODAS</a>
    	              <h2 class="crown"><a href="blog.html"><span class="light"></span></a>NOTICIAS</h2>
    	              <h5 class="subcrown">De Nuestras Reinas</h5>
    	              <span class="bolded-line"></span>
    	          </div>
    	          <div class="row">
                    <?php if($count_news > 0){ ?>
                    <div class="nav-latest-news">                        
                        <ul>
                            <?php for ($i=1; $i < ($count_news + 1); $i++) { ?> 
                                <li><a href="javascript:void(0)"><?php echo $i; ?></a></li>
                            <?php } ?>                              
                        </ul>                        
                    </div>
                    <?php 
                        $i++;
                    } ?>
                    <?php foreach ($news as $nw) {
                        $i = 1;                        
                        if($nw['NewsPic'])
                            $scr = "images/noticias/".$nw['NewsId'].".jpg";
                        else
                            $scr = "images/news_pic.png";

                    ?>
                    <div class="news_1">
    	              <article class="span2">
    	                  <img src="<?php echo $scr ?>" width="213" height="158" />
    	              </article>
    	              <article class="span4 news_margin news_width">
    	                  <h3 class="no-margin"><?php echo $nw['NewsTitle'] ?></h3>
    	                  <div class="meta-info">
    	                      <span class="date"><?php echo f_fecha($nw['dateAdd']) ?></span>
    	                  </div>
    	                  <p><?php echo nl2br(myWrap($nw['NewsPreview'], 60, 5)) ?></p>
    	                  <a href="detail-news.php?id=<?php echo $nw['NewsId'] ?>" class="read-more">Leer Mas -</a>
    	              </article>
                     </div> 
                    <?php
                        $i++; 
                    } ?>   
    	          </div>
    	      </div><!-- /latest news -->
    	      
              <!-- gallery -->
    	      <div class="span2 hidden-phone">
    	          <div class="lined">    	              
    	              <h2 class="crown"><a href="gallery.html">MAGAZINE</a></h2>
    	              <h5 class="subcrown">De las Reinas de Colombia</h5>
    	              <span class="bolded-line"></span>

    	          </div>
    	          <a href="magazine.php"><img class="port" src="images/recortes/portada_index.png"></a>
    	      </div><!-- /gallery -->
    	      
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
                    <div class="counter">
                       <div> 
                      <?php 
                        $cont = $obj->CNF_get('visitas_index');
                        $cont++;
                        echo $cont;
                        $obj->CNF_set('visitas_index', $cont); ?>
                        </div>
                        <div class="counter_box2"><strong>N° Visitas</strong></div>
                    </div>    	          
    	      </div><!-- /Advertisment -->
    	      
    	  </div><!-- /row -->
    	  
    	</div>
    </div> <!-- /container -->
    
    
    
    <div class="container">
        
        <div class="row"><!-- about us -->            
        </div><!-- /about us -->
        
        <div class="row">
            <div class="span12">
                <div class="divide-line">
                    <div class="icon icons-scissors"></div>
                </div>
            </div>
        </div>
        
        <div class="row"><!-- Advertisment -->
            <?php
                $advers = $obj->getPositionsFromPage($page_id, 'bottom');
                $banner_size = $obj->sizeImageByType($advers[0]['type']);
                $class_banner = ($advers[0]['url'] == '') ? 'class = "banner_rectangle"' : 'class = "banner_default" style = "width : '.$banner_size['width'].'px; height : '.$banner_size['height'].'px; margin-left : 30px; display : inline-block"';
                                                          
            ?>            
            <div <?php echo $class_banner ?>>
                <?php if(!empty($advers[0]['url'])): ?>
                <img src="<?php echo $path_banner.$advers[0]['url']; ?>" width=<?php echo $banner_size['width']; ?> height=<?php echo $banner_size['height']; ?> />
                <?php endif ?>
            </div>
        </div><!-- /Advertisment -->     
    </div> <!-- /container -->
    
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
    <script type="text/javascript">
        /*
         * Script Change Tabs with interval time by René Santis V   v.1.0.
         */

        var intervalId;


        function changeTab(){
            //Set interval
            intervalId = setInterval(processTab, 5000);
        }

        function processTab(){
            //length of tabs    
            var len = $(".nav-latest-news ul li").length;

            //We need to validate if is the last LI for repeat the loop
            if($(".nav-latest-newss ul li:nth-child("+len+")").hasClass('button_selected')){
                //alert(len)
                //If is the last LI We remove all classes and add class button to first LI
                $(".nav-latest-news ul li").each(function(index){
                    //Remove classes
                    $(this).removeClass('button_selected');
                    $(".news_1:nth-child("+(index + 2)+")").removeClass('info_tab_show');
                });
                //Add to firsts elements show class class
                $(".nav-latest-news ul li:first").addClass('button_selected');
                $(".news_1:first").addClass('info_tab_show');
                cont = 1;
            }else{          
                $(".nav-latest-news ul li").each(function(index){
                    //If is not the last LI of UL we do an iteraction of each LI
                    cont = index + 1;
                    cont_id = index + 2;
                    cont_id2 = (cont_id + 1);
                    //alert(index)
                    if($(this).hasClass('button_selected')){
                        //reamove the class button to current LI            
                        $(this).removeClass('button_selected');
                        $(".news_1:nth-child("+cont_id+")").removeClass('info_tab_show');             
                        //Add the class button to next LI           
                        $(".nav-latest-news ul li:nth-child("+(index + 2)+")").addClass('button_selected');
                        $(".news_1:nth-child("+cont_id2+")").addClass('info_tab_show');           
                        //With that we will stop the each iteration 
                        return false                    
                    }       
                });
            }
            cont++;
        }

        $(document).ready(function(){
            $(".nav-latest-news ul li:first").addClass('button_selected');
            $(".news_1:first").addClass('info_tab_show');
            //Uncomment changeTab() if you want to change auto
            //changeTab();    
            $(".nav-latest-news ul li").click(function(){
                clearInterval(intervalId); 
                $(".nav-latest-news ul li").each(function(index){
                    $(this).removeClass('button_selected');
                    $(".news_1:nth-child("+(index + 2)+")").removeClass('info_tab_show');
                });       
                $(this).addClass('button_selected');
                $(".nav-latest-news ul li").each(function(index){
                    cont_id = index + 2;
                    if($(this).hasClass('button_selected')){
                        $(".news_1:nth-child("+(cont_id)+")").addClass('info_tab_show');
                    }
                });
                //Uncomment changeTab() if you want to change auto
                //changeTab();
            });
        });
    </script>
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
