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
            <a href="index.php"><img src="images/logo-w2.png" alt="La reina es Colombia" width="287" height="65" class="logo" /></a>
            <!-- <a class="brand" href="index.html">
              <img src="images/scissors.png" alt="HairPress Logo" width="48" height="53" class="logo" />
              <h1>                hair<span class="theme-clr">press</span>
              </h1>
              <span class="tagline">Template for Hairsalons</span>
            </a> -->
            
            <!--  =============================================  -->
          <!--  = Main top navigation with drop-drown menus =  -->
        <!--  =============================================  -->
            <?php
              $self_page = explode('/', $_SERVER['PHP_SELF']);                         
            ?>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="<?php echo $active = ($self_page[2] == '' or $self_page[2] == 'index.php') ? 'active' : ''; ?> textmenu"><a href="index.php">Inicio</a></li>
               <li class="<?php echo $active = ($self_page[2] == 'news.php' or $self_page[2] == 'detail-news.php') ? 'active' : ''; ?> textmenu"><a href="news.php">Noticias</a></li>    
               <li class="<?php echo $active = ($self_page[2] == 'magazine.php') ? 'active' : ''; ?> textmenu"><a href="magazine.php">La Revista</a></li>
               <!-- <li><a href="gallery.html">Gallery</a></li> -->
               <li class="textmenu"><a href="http://josegomezorozco.blogspot.com/">Blog</a></li>                
                 <li class="<?php echo $active = ($self_page[2] == 'contact.php') ? 'active' : ''; ?> textmenu"><a href="contact.php">Contacto</a></li>
              </ul>
              <!-- <a href="make-an-appointment.html" class="btn btn-theme btn-large pull-right">Make an appointment</a> -->
            </div><!-- /.nav-collapse-->
          </div>
        </div>
      </div>
    </header>