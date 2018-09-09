	<div class="card card-container">
        
        <!-- Begin # DIV Form -->
        <div id="div-forms">
        <?php //echo validation_errors(); ?>
        <?php echo (!empty($_SESSION['login_msg']) ? $_SESSION['login_msg'] :'');?>
            <!-- Begin # Login Form -->
            <form id="login-form" action="<?php echo site_url('login'); ?>" method="post">

				<div class="modal-header" align="center"> 
					<img id="profile-img" class="profile-img-card" src="<?= site_url('resource/img/lock.png') ?>" />
					
					<p class="profile-name">Wecome to <?=config_item('code_org_s') .' - '. config_item('code_sys_s')?></p>

				</div>
		
                <div class="modal-body">

					<input id="login_username" name="login_username" type="text" class="form-control" placeholder="Username" required autofocus>
					<input id="login_password" name="login_password" type="password" class="form-control"  placeholder="Password" required >
					
		    		
		    	</div>
		        <div class="modal-footer">
                    <div>
                        <button id="login_check_btn" type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

		        </div>
            </form>
            <!-- End # Login Form -->
            
            
            
        </div>
        <!-- End # DIV Form -->
        
	</div>