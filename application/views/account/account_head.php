<h3 ><?php echo $title; ?></h3>
<div class="card ">
	
	<!-- Begin # DIV Form -->
	<div id="div-forms">

		<!-- Begin # Login Form -->
        <?php echo validation_errors(); ?>
		<form id="login-form" action="<?=site_url('account/glhead') ?>" method="post">
		
			<div class="modal-body">

			
			    <input id="th_name" name="th_name" type="text" class="form-control" placeholder="GL Head" autofocus="autofocus" required="required">
			    <input id="th_remarks" name="th_remarks" type="text" class="form-control" placeholder="Remarks"  required="required">

			   
			</div>
			<div class="modal-footer">
				
				<button id="save" type="submit" class="btn btn-primary btn-block">Save</button>
				
			</div>
		</form>

		


			<!-- End # Login Form -->
	</div>
		<!-- End # DIV Form -->
		
</div>


<div class="table-responsive">
    <table class="table table-hover table-striped ">
        <thead> 
            <tr class="info">
                <th>GL Name</th>
                <th>Remarks of GL</th>
              <!--   <th>Roll</th>
                <th>Regi. No</th>
                <th>Student Name</th>
                <th>Father's Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Pass</th>
                <th>Admission Date</th>-->
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="table-striped">
        <?php foreach ($gl_list as $gllist): ?>
            <tr>

                <?= '<td>'. $gllist['th_name']       . '</td>'; ?>
                <?= '<td>'. $gllist['th_remarks']     . '</td>'; ?>
                <!-- <?= '<td>'. $gllist['std_roll']      . '</td>'; ?>
                <?= '<td>'. $gllist['std_reg']       . '</td>'; ?>
                <?= '<td>'. $gllist['std_name']      . '</td>'; ?>
                <?= '<td>'. $gllist['std_fa']        . '</td>'; ?>
                <?= '<td>'. $gllist['std_cont']      . '</td>'; ?>
                <?= '<td>'. $gllist['std_email']     . '</td>'; ?>
                <?= '<td>'. $gllist['std_pass']      . '</td>'; ?>
                <?= '<td>'. $gllist['std_adm_date']  . '</td>'; ?> -->

                <?= '<td><a href="' . site_url('account/glview/'.$gllist['th_id']) . '" data-toggle="tooltip" data-placement="top" title="Edit"><img width="20px" height="20px" src="' . site_url('resource/img/edit.png') .'" alt="Do Edit"></a></td>'; ?> 
            </tr>
        </tbody>
            
    <?php endforeach; ?>

    </table>
</div>
