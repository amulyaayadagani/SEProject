<?php
  // $content = '<h2>Your Main Content Here</h2>';
  // $pageContent = '<h1 class="heading">A Best Place To Stay</h1>';
   session_start();
   include('./views/Header.php');
   include('../master.php');
   // include('./controllers/indexController.php');
   // include('./views/rooms.php');
  
  $_SESSION["user_id"] = "99887";
  $_SESSION["user_type"] = "Admin";
  $allowed = array('search','rooms','reservation','about','registration','admin','login'); // add the pagenames you need
	$page = ( isset($_GET['page']) ) ? $_GET['page'] : 'search';
    
	if (in_array($page, $allowed) ) {

		
			include("./views/$page.php");
	    
	} else {
	    //include("./views/404.php");
}

  include('./views/Footer.php');
?>