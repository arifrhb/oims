
		<div id="footer" class="container navbar-fixed-bottom" align="center" > <!--style="background-color: #eee;"-->
		  Page rendered in <strong>{elapsed_time}</strong> seconds. 
		  <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '. </strong>' : '';  echo 'Current PHP Version <strong>' .phpversion(). '</strong>'  ?> 
		  <br> Developed by MSC14
		</div>

     <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?= site_url('resource/js/bootstrap.js') ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?= site_url('resource/js/ie10-viewport-bug-workaround.js') ?>"></script>
    <script src="<?= site_url('resource/js/sobkichu.js') ?>"></script>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="<?= site_url('resource/js/ie-emulation-modes-warning.js') ?>"></script>

    <!--[if lt IE 9]>
      <script src="<?= site_url('resource/js/html5shiv.min.js') ?>"></script>
      <script src="<?= site_url('resource/js/respond.min.js') ?>"></script>
      <script src="<?= site_url('resource/js/ie8-responsive-file-warning.js') ?>"></script>
    <![endif]-->
	

  </body>
</html>


