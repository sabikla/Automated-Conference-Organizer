<!--

Website: Automated Conference Organizer
Author: Sabique Ahammed Lava
Mobile : 9847303932
Date: 26-07-2014

-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="keywords" content="Automated Conference Organizer, ACO" />
    <meta name="description" content="Automated Conference Organizer" />
    
<title> ACO - v1.0 | <?php echo $title; ?>
</title>
<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo $pathPrefix; ?>css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo $pathPrefix; ?>css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo $pathPrefix; ?>css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo $pathPrefix; ?>dist/css/bootstrap.css" />
<script type="text/javascript" src="<?php echo $pathPrefix; ?>js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo $pathPrefix; ?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo $pathPrefix; ?>js/cufon-replace.js"></script>
<script type="text/javascript" src="<?php echo $pathPrefix; ?>js/Copse_400.font.js"></script>
<script type="text/javascript" src="<?php echo $pathPrefix; ?>js/fading.js"></script>
<link rel="stylesheet" href="<?php echo $pathPrefix; ?>css/menustyle/styles.css" type="text/css" media="all">
<script type="text/javascript" src="<?php echo $pathPrefix; ?>css/menustyle/menu_jquery.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo $pathPrefix; ?>js/ie6_script_other.js"></script>
<script type="text/javascript" src="<?php echo $pathPrefix; ?>js/html5.js"></script>
<![endif]-->
</head>
<body id="page1" onLoad="load_ann();">
<!-- START PAGE SOURCE -->
<div class="body1">
  <div class="body2">
    <div class="main">
      <header>      
        <div class="wrapper">
          <img src="<?php echo $pathPrefix; ?>images/logo.png" height="82" width="115" style="float:left; position:absolute; top:15px;">    
          <img src="<?php echo $pathPrefix; ?>images/logo.gif" width="153" height="60" style="margin-left:150px;">
         

          <span style="z-index:100; position:absolute; margin-top:70px; margin-left:-150px; color:#FFF;">Automated Conference Organizer</span>
          <div class="right">
            <nav>
              <ul id="top_nav">
                <li><a href="<?php echo $pathPrefix; ?>index.php/login" target="_blank">User Area</a></li>
                <li><a href="#">Sitemap</a></li>
              </ul>
              <form id="search" method="get" action="http://www.google.com/search" target="_blank">
                <div>
                  <input type="submit" class="submit" value="">
                  <input type="text" class="input" name="q" id="q" value placeholder="Search">
					<input type="hidden" name="sitesearch" value="www.sabikla.in">
                </div>
              </form>
            </nav>
          </div>
        </div>
        
        <div id='cssmenu'>
            <ul>
               <li <?php if($pid==0){ echo 'class="active"'; } ?>><a href="<?php echo $pathPrefix; ?>index.php/reviewerarea/paperList">Paper List</a></li>
               <li <?php if($pid==1){ echo 'class="active"'; } ?>><a href="<?php echo $pathPrefix; ?>index.php/reviewerarea/message">Message</a></li>
               <li <?php if($pid==2){ echo 'class="active"'; } ?>><a href="<?php echo $pathPrefix; ?>index.php/reviewerarea/reviewList">Reviews</a></li>
                
                <li <?php if($pid==3){ echo 'class="active"'; } ?>><a href="<?php echo $pathPrefix; ?>index.php/reviewerarea/logout">Logout</a></li>
            </ul>
        </div>
