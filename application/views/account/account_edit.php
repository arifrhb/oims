
<h2><?php echo $title; ?></h2>


<div class="card card-container">
    <div id="div-forms">
    
    <!-- Begin # Login Form -->
    <?php echo validation_errors(); ?>
    <form id="login-form" action="<?php echo site_url('student/update'); ?>" method="post">
    

        <div class="modal-header" align="center"> 
            
            <p class="profile-name"><?=$title?> </p>
        </div>

        <div class="modal-body">

            <input id="std_id" name="std_id" type="hidden" class="form-control" value="<?=$std_list['std_id']?>"  readonly alt="ID Can't be changed">

                <select id="std_cou" name="std_cou" class="form-control" autofocus>
                <?php foreach ($cou_name as $course): ?>
                    <option <?php if($course['cou_name'] == $std_list['cou_name']) echo 'selected = "selected"';?> value='<?=$course['cou_id']?>'> <?=$course['cou_name']?> </option>
                <?php endforeach; ?>
                </select>
                <input id="std_batch" name="std_batch" type="text" class="form-control" placeholder="Enrolling Batch" value="<?=$std_list['std_batch']?>" required="required">
                <input id="std_roll" name="std_roll" type="text" class="form-control" placeholder="Student Roll" value="<?=$std_list['std_roll']?>" onkeydown="number(this.id)">
                <input id="std_reg" name="std_reg" type="text" class="form-control" placeholder="Student Registration Number" value="<?=$std_list['std_reg']?>" onkeydown="number(this.id)">
                <input id="std_name" name="std_name" type="text" class="form-control" placeholder="Student Name" value="<?=$std_list['std_name']?>">
                <input id="std_fa" name="std_fa" type="text" class="form-control" placeholder="Fathers Name" value="<?=$std_list['std_fa']?>">
                <input id="std_cont" name="std_cont" type="tel" class="form-control" placeholder="Mobile No" value="<?=$std_list['std_cont']?>" onkeydown="number(this.id)">
                <input id="std_email" name="std_email" type="text" class="form-control" placeholder="Email Address" value="<?=$std_list['std_email']?>">
                <input id="std_adm_date" name="std_adm_date" type="text"  class="form-control" placeholder="Admission Date (YYYY-MM-DD)" value="<?=$std_list['std_adm_date']?>"> 
                <span id="err_msg"></span>


            </div>
        <div class="modal-footer">
            <div>
                <button id="login_check_btn" type="submit" class="btn btn-primary btn-block">Update</button>
            </div>

        </div>
    </form>
    <!-- End # Login Form -->
    </div>
    <!-- End # DIV Form -->
    
</div>