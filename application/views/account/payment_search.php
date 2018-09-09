
<div class="card ">
	
	<!-- Begin # DIV Form -->
	<div id="div-forms">
		
		<!-- Begin # Login Form -->
		<?php echo validation_errors(); ?>
		<form id="login-form" action="<?=site_url('account/search') ?>" method="post">
		
			<div class="modal-header" align="center"> <!-- <strong><?=$title?></strong> -->
				<!-- <img id="profile-img" class="profile-img-card" src="img/avatar.png" /> -->
				<p class="profile-name"><?=$title?> </p>
			</div>
	
			<div class="modal-body">

				<!-- <input id="tns_date" name="tns_date" type="text"  class="form-control" placeholder="Payement Date (YYYY-MM-DD)" value="<?php date_default_timezone_set('Asia/Dacca'); echo date('Y-m-d'); ?>"> -->
				<select id="std_cou" name="std_cou" class="form-control" autofocus>
					<option value=''> Select Course </option>
                <?php foreach ($cou_name as $course): ?>
                    <option value='<?=$course['cou_id']?>'> <?=$course['cou_name']?> </option>
                <?php endforeach; ?>
                </select>
			    
			    <select id="std_batch" name="std_batch" class="form-control" autofocus>
			    	<option value=''> Select Batch </option>
                <?php foreach ($batch_name as $blist): ?>
                    <option value='<?=$blist['std_batch']?>'> <?=$blist['std_batch']?> </option>
                <?php endforeach; ?>
                </select>

			    <input id="std_roll" name="std_roll" type="text" class="form-control" placeholder="Student Roll" required="required" onkeyup="number(this.id)">

			    <!-- <select id="tns_name" name="tns_name" class="form-control">
                <?php foreach ($gl_list as $glhead): ?>
                    <option value='<?=$glhead['th_id']?>'> <?=$glhead['th_name']?> </option>
                <?php endforeach; ?>
                </select> -->
                <!-- <input id="ths_pay" name="tns_pay" type="text" class="form-control" placeholder="Receive Amount" required="required" onkeyup="number(this.id)"> -->
			    
				<span id="err_msg"></span>

			</div>
			<div class="modal-footer">
				
				<button id="save" type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp; Search</button>
				
			</div>
		</form>
			<!-- End # Login Form -->
	</div>
		<!-- End # DIV Form -->
		
</div>
