<h3 ><?php echo $title; ?></h3>
<div class="card ">
	
	<!-- Begin # DIV Form -->
	<div id="div-forms">
		<?php echo validation_errors(); ?>
		<form id="login-form" action="<?=site_url('account/glupdate') ?>" method="post">
		
			<div class="modal-body">

				<input id="th_id" name="th_id" type="text" class="form-control" placeholder="GL ID" required="required" value="<?=$gl_list['th_id']?>">
			    <input id="th_name" name="th_name" type="text" class="form-control" placeholder="GL Head" autofocus="autofocus" required="required" value="<?=$gl_list['th_name']?>">
			    <input id="th_remarks" name="th_remarks" type="text" class="form-control" placeholder="Remarks"  required="required" value="<?=$gl_list['th_remarks']?>">

			   
			</div>
			<div class="modal-footer">
				
				<button id="save" type="submit" class="btn btn-primary btn-block">Save</button>
				
			</div>
		</form>
		


			<!-- End # Login Form -->
	</div>
		<!-- End # DIV Form -->
		
</div>


