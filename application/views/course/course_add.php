
<div class="card ">
	
	<!-- Begin # DIV Form -->
	<div id="div-forms">
	
		<!-- Begin # Login Form -->
		<?php echo validation_errors(); ?>
		<form id="product-form" action="<?=site_url('course/add') ?>" method="post">
		
			<div class="modal-header" align="center"> 
				
				<p class="profile-name"><?=$title?> </p>
			</div>
	
			<div class="modal-body">

				<input id="cou_name" name="cou_name" type="text" class="form-control" placeholder="Course Name"  onkeydown="upper(this.id)" autofocus required>
				<input id="cou_title" name="cou_title" type="text" class="form-control" placeholder="Course Title" onkeydown="upper(this.id)" required>
				<input id="cou_year" name="cou_year" type="text" class="form-control" placeholder="Years of Course" onkeydown="number(this.id)" required>
				<!-- <span id="err_cou_year"></span> -->
				<input id="cou_sem" name="cou_sem" type="text" class="form-control" placeholder="Total Semestar of the Course" onkeydown="number(this.id)" required>
				<!-- <span id="err_cou_sem"></span> -->
				<!-- <select id="cou_shift" name="cou_shift" class="form-control"> -->
					<!-- <?php foreach ($host_list as $hlist): ?> -->
						<!-- <?= '<option>'. $hlist['pro_name'] . '</option>'; ?> -->
					<!-- <?php endforeach; ?> -->
					<!-- <option value='0'>Day</option> -->
					<!-- <option vlaue='1'>Evening</option> -->
			    <!-- </select> -->
				<input id="cou_cost" name="cou_cost" type="text" class="form-control" placeholder="Total Cost this course" onkeydown="number(this.id)" required>
				<span id="err_msg"></span>
							
			</div>
			<div class="modal-footer btn-group">
			
				<button id="submit" type="submit" class="btn btn-primary ">Save</button>
				<button id="reset" type="reset" class="btn btn-danger  ">Reset</button>
					 
			</div>

		</form>
		<!-- End # Login Form -->

	</div>


	<!-- End # DIV Form -->
	

<!-- </div> -->

<!-- <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form> -->


</div>
