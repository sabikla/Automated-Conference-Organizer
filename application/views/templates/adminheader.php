<!--

Project : Automated Conference Organizer
Author: Sabique Ahammed Lava
Mobile : 9847303932
Date: 26-07-2014

-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="keywords" content="Automated Conference Organizer, ACO " />
    <meta name="description" content="Automated Conference Organizer, ACO" />
    
<title> ACO v1.0 | <?php echo $title; ?>
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
                </div>
              </form>
            </nav>
          </div>
        </div>
        
        <div id='cssmenu'>
            <ul>
            	<li class="has-sub <?php if($pid==0){ echo 'active'; } ?>"><a href='#'><span>List</span></a>
                    <ul>
                       <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/userList">Users List</a></li>
                       <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/newsAndEvents">News &amp; Events</a></li>
                       <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/messagesList">Messages List</a></li>
                       <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/reviewerList">Reviewer List</a></li>
                       <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/dateList">Date List</a></li>
                       <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/cameraReadyPaperList">Camera Ready Paper</a></li>
                        
                    </ul>
                </li>
                <li class="has-sub <?php if($pid==3){ echo 'active'; } ?>"><a href='#'><span>Abstract</span></a>
                	<ul>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/abstractList/pending">Pending Papers</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/abstractList/accepted">Accepted Papers</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/abstractList/rejected">Rejected Papers</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($pid==4){ echo 'active'; } ?>"><a href='#'><span>Fullpaper</span></a>
                	<ul>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/fullPaperList/pending">Pending Papers</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/fullPaperList/accepted">Accepted Papers</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/fullPaperList/rejected">Rejected Papers</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($pid==1){ echo 'active'; } ?>"><a href='#'><span>Post</span></a>
                	<ul>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/postNews">News & Eve</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/postMessage">Message</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/postDate">Date</a></li>
                    </ul>
                </li>
               
                <li class="has-sub <?php if($pid==5){ echo 'active'; } ?>"><a href='#'><span>CMS</span></a>
                	<ul>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/createCommittee">Create Committee</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/addMembersToCommittee">Add Members to Committee</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/addTrack">Add Track</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/addImageSlides">Add Image to Slides</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/addToAbout">Add Content to About Page</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/generalSettings">General Settings</a></li>
                    </ul>
                </li> 
                <li class="has-sub <?php if($pid==2){ echo 'active'; } ?>"><a href='#'><span>Review</span></a>
                	<ul>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/createReviewer">Create Reviewer</a></li>
                        <li ><a href="<?php echo $pathPrefix; ?>index.php/adminarea/submitPaperForReview">Submit paper for review</a></li>
                    </ul>
                </li>
                <li ><a href="<?php echo $pathPrefix; ?>index.php/userarea/logout">Logout</a></li>
            </ul>
        </div>