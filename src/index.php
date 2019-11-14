<?php
  // $content = '<h2>Your Main Content Here</h2>';
  // $pageContent = '<h1 class="heading">A Best Place To Stay</h1>';
   include('./views/Header.php');
   include('../master.php');
   // include('./controllers/indexController.php');
   // include('./views/rooms.php');
  
  
  $allowed = array('search','rooms','ModifyReservation','about','registration','admin','login','reserve'); // add the pagenames you need
	$page = ( isset($_GET['page']) ) ? $_GET['page'] : 'search';
    
	if (in_array($page, $allowed) ) {

		
			include("./views/$page.php");
	    
	} else {
	    //include("./views/404.php");
}

  include('./views/Footer.php');
?>