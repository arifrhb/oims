<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  <!-- Start Menubar header -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="padding: 5px 0px 5px 0px;" class="navbar-brand" href="<?= site_url('home') ?>"><img  src="<?= site_url('resource/img/logo.png') ?>" alt=""></a> <!-- class="img-circle" -->
    </div>
    <!-- End Menubar header -->

    <!-- Start Menu Items -->
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li ><a href="<?= site_url('home') ?>">Home</a></li>

<?php 
if ($_SESSION['pass_status'] === '1') 
{ 
   if (($_SESSION['usr_access'] === 'purchase')  || ($_SESSION['usr_access'] === 'admin'))
  //if ($_SESSION['usr_access'] === 'purchase') 
  {
?>
        <!-- Customer related menus -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Assets</a> <!-- <span class="caret"></span> -->
          <ul class="dropdown-menu"> 
            <li><a href="<?= site_url('assets/category') ?>">Category</a></li>
            <li><a href="<?= site_url('assets/item') ?>">Item</a></li>
            <li><a href="<?= site_url('assets/brand') ?>">Brand</a></li>
            <li><a href="<?= site_url('assets/model') ?>">Model</a></li>

          </ul>
        </li>
        <!-- End of Customers related menu -->

        <!-- Product related menus -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vendor</a> <!-- <span class="caret"></span> -->
          <ul class="dropdown-menu"> 
            <li><a href="<?= site_url('vendor/addnew') ?>">Vendor New</a></li>
          </ul>
        </li>
<?php 
  }
  if (($_SESSION['usr_access'] === 'admin'))
  {
?>
        <!-- Product related menus -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Branch</a> <!-- <span class="caret"></span> -->
          <ul class="dropdown-menu"> 
            <li><a href="<?= site_url('branch/addnew') ?>">Branch Status</a></li>

          </ul>
        </li>

        <!-- End of Product related menu -->
<?php 
  }
   if (($_SESSION['usr_access'] === 'purchase')  || ($_SESSION['usr_access'] === 'admin'))
  //if ($_SESSION['usr_access'] === 'purchase')
  {
?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Purchase<!-- <span class="caret"></span> --></a>
          <ul class="dropdown-menu">
            <!-- <li class="dropdown-header">Students</li> -->
            <li><a href="<?=site_url('purchase/newpur')?>">New</a></li>
            <!-- <li><a href="<?=site_url('purchase/#')?>">#</a></li> -->
            <!-- <li><a href="<?=site_url('purchase/#')?>">#</a></li> -->
          </ul>
        </li>

<?php 
  }
   if (($_SESSION['usr_access'] === 'store')  || ($_SESSION['usr_access'] === 'admin'))
  //if ($_SESSION['usr_access'] === 'store') 
  {
?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Store</a>
          <ul class="dropdown-menu">
            <!-- <li class="dropdown-header">Students</li> -->
            <li><a href="<?=site_url('store/status')?>">Status</a></li>
            <li><a href="<?=site_url('store/pending')?>">Pending</a></li>
            <li><a href="<?=site_url('store/distribute')?>">Distribute</a></li>
          </ul>
        </li>
<?php 
  }
  if (($_SESSION['usr_access'] === 'admin'))
  {
?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<!-- <span class="caret"></span> --></a> 
          <ul class="dropdown-menu">
            <!-- <li class="dropdown-header">Users</li> -->
            <li><a href="<?=site_url('settings/users')?>">Users</a></li>
          </ul>
        </li>
<?php 
  }
}
?>
      </ul>
      <!-- Right side panel for user information -->
	    <div class="navbar-header navbar-right">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
		    
        <ul class="nav navbar-nav ">
			   <li class="dropdown"><a href="#" style="padding: 7px;"class="navbar-brand dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"><img class="img-circle" src="<?= site_url('usrphoto/arif.uddin.jpg') ?>" alt=""></a>
  			  
		       <ul class="dropdown-menu">
              <li class="dropdown-header"><strong><?php echo $_SESSION ['usr_name']; ?></strong></li>

              <li class="navbar-user"><img src="<?= site_url('usrphoto/arif.uddin.jpg') ?>" width="100px"></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= site_url('user') ?>">Profile</a></li>
              <li><a href="<?= site_url('user/change_password') ?>">Change Password</a></li>
              <li><a href="<?= site_url('user') ?>">Change Photo</a></li>
              <!-- <li><a href="#">Something else here</a></li> -->
              <li role="separator" class="divider"></li>
              <!-- <li class="dropdown-header">Nav header</li> -->
              <!-- <li><a href="#">Separated link</a></li> -->
              <li><a href="<?= site_url('logout') ?>">Logout</a></li>
            </ul>
          </li>
        </ul>	
	  
      </div>
		
		</div><!--/.nav-collapse -->	
  </div>
</nav>