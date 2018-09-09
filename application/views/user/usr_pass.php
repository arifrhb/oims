
    <h1>Welcome <?= $this->session->userdata('usr_name') ?></h1>

<div class="card card-container">
	
	<!-- Begin # DIV Form -->
	<div id="div-forms">
	
		<!-- Begin # Login Form -->
		<?php echo validation_errors(); ?>
		<form id="login-form" action="<?=site_url('user/change_password') ?>" method="post">
		
			<div class="modal-body">

			<input id="usr_id" name="usr_id" type="text" class="form-control hide" value="<?=$this->session->userdata('usr_id') ?>"   ><!-- disabled -->

				<input id="usr_login" name="usr_login" type="text" class="form-control" value="<?=$this->session->userdata('usr_login') ?>"  readonly ><!-- disabled -->
				<input id="new_password" name="new_password" type="text" class="form-control" placeholder="Enter Passwrod"  autofocus>
				<!-- <input id="new_password" name="new_password" type="text" class="form-control" placeholder="New Password" > -->
				<!-- <input id="confirm_password" name="confirm_password" type="tel" class="form-control" placeholder="Confirm Password" > -->
				
			</div>
			<div class="modal-footer">
				<div>
					<button id="change_password_btn" type="submit" class="btn btn-primary  btn-block">Change Password</button>
				</div>

			</div>
		</form>
		<!-- End # Login Form -->

	</div>
	<!-- End # DIV Form -->
	
</div>