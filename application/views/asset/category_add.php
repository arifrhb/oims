
<!-- <div class="card "> -->
<div id="div-forms">	
	<!-- Begin # DIV Form -->
	
	<div class="modal-header" align="center"> <p class="profile-name"><?=$title?> </p>

	</div>
<!-- <?=$this->theme->get('current_user'); ?> -->
	<div class="col-sm-5">
		
		<!-- Begin # Login Form -->
		<?php echo validation_errors(); ?>
		<form id="login-form" action="<?=site_url('assets/category') ?>" method="post">
		
			<div class="modal-body">

			    <input id="at_name" name="at_name" type="text" class="form-control" placeholder="Asset Type" >
			    <input id="at_remarks" name="at_remarks" type="text" class="form-control" placeholder="Remarks / Example " >
			
			</div>
			<div class="modal-footer">
				
				<button id="save" type="submit" class="btn btn-primary btn-block">Save</button>
				
			</div>
		</form>

			<!-- End # Login Form -->
	</div>
		<!-- End # DIV Form -->
		
	<!-- </div> -->
	<div class="col-sm-7">

		<div class="panel panel-primary">
		  <div class="panel-heading"><?=$sub_title?></div>
		  <!-- <div class="panel-body">
		    Panel content
		  </div> -->

		  <ul class="list-group">
			  
			  <table class="table table-hover table-striped" id="result">
			  	<thead > 
			  	<tr >
			  		<th>#</th>
			  		<th>Catetory</th>
			  		<th>Remarks</th>
			  	</tr>
			  	</thead> 

			  	<tbody class="table-striped">

			  	<?php foreach ($cat_name as $catlist): ?>
              		<!-- <?=site_url('assets/edit/'.$catlist['at_id'])?> -->
              		<!-- <a href="#" class="list-group-item"><?=$catlist['at_name']?></a> -->
                    

                    <!-- <a href="' . site_url('student/view/'.$slist['std_id']) . '" data-toggle="tooltip" data-placement="top" title="Edit"><img width="20px" height="20px" src="' . site_url('resource/img/edit.png') .'" alt="Do Edit"></a> -->
                    <tr>
			  		<td ><?=$catlist['at_id']?></td>
			  		<td><?=$catlist['at_name']?></td>
			  		<td><?=$catlist['at_remarks']?></td>
			  		<!-- <td width="30px"><a href="<?=site_url('assets/edit/'.$catlist['at_id'])?>" data-toggle="tooltip" data-placement="top" title="Edit"><img width="20px" height="20px" src="<?=site_url('resource/img/edit.png')?>" alt="Do Edit"></a></td> -->
			  	</tr>
              	<?php endforeach; ?>
              	</tbody >
              </table>
		
			</ul>


		</div>

	</div>
		
</div>