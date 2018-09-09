<div class="card ">
    
    <!-- Begin # DIV Form -->
    <div id="div-forms">
    
    <!-- Begin # Login Form -->
    <?php echo validation_errors(); ?>
    <form id="login-form" action="<?php echo site_url('course/update'); ?>" method="post">

		<div class="main" align="center"><strong><?php echo $title; ?></strong></div>

        <div class="modal-body">
            <input id="cou_id" name="cou_id" type="text" class="form-control" value="<?=$cou_list['cou_id']; ?>"  readonly alt="ID Can't be changed">
			<input id="cou_name" name="cou_name" type="text" class="form-control" value="<?=$cou_list['cou_name']; ?>"  onkeydown="upper(this.id)" autofocus required>
            <input id="cou_title" name="cou_title" type="text" class="form-control" value="<?=$cou_list['cou_title']; ?>" onkeydown="upper(this.id)" required>
            <input id="cou_year" name="cou_year" type="text" class="form-control" value="<?=$cou_list['cou_year']; ?>" onkeydown="number(this.id)" required>
            <!-- <span id="err_cou_year"></span> -->
            <input id="cou_sem" name="cou_sem" type="text" class="form-control" value="<?=$cou_list['cou_sem']; ?>" onkeydown="number(this.id)" required>
            <!-- <span id="err_cou_sem"></span> -->
            <!-- <select id="cou_shift" name="cou_shift" class="form-control" > -->
                <!-- <?php foreach ($host_list as $hlist): ?> -->
                    <!-- <?= '<option>'. $hlist['pro_name'] . '</option>'; ?> -->
                <!-- <?php endforeach; ?> -->
                <!-- <option <?php if ($cou_list['cou_shift'] == 'Day')  echo 'selected = "selected"'; ?>>Day</option> -->
                
                <!-- <option <?php if ($cou_list['cou_shift'] == 'Evening')  echo 'selected = "selected"'; ?>>Evening</option> -->

            <!-- </select> -->
            <input id="cou_cost" name="cou_cost" type="text" class="form-control" value="<?=$cou_list['cou_cost']; ?>" onkeydown="number(this.id)" required>
            <span id="err_msg"></span>
			
			
    	</div>
        <div class="modal-footer">
            <div>
                <button id="login_check_btn" type="submit" class="btn btn-primary btn-lg btn-block">Update Course</button>
            </div>

        </div>
    </form>
    <!-- End # Login Form -->
    </div>
    <!-- End # DIV Form -->
    
</div>