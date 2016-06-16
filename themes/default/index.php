<?php include('header.php'); 
  

  if(!empty($_SESSION['oims_login']))
    include('menu.php'); 
?>
	

<div class="container">

    <div class="row">
    	<!-- <div class="span12"> -->
    	  <?php //display messages ?>
	      <?php bootstrap_messages( $this->messages(FALSE) ); 
 
        ?>

	      <?php //display content (the view) ?>
    	  <?php echo $this->content(); ?>
	    <!-- </div> -->
    </div>
</div>

<?php include('footer.php'); ?>    
