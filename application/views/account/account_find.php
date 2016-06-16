
<div class="card ">
    
    <!-- Begin # DIV Form -->
    <div id="div-forms">
        
        <!-- Begin # Login Form -->
        <?php echo validation_errors(); ?>
        <form id="login-form" action="<?=site_url('student/admission') ?>" method="post">
        
            <div class="modal-header" align="center"> <!-- <strong><?=$title?></strong> -->
                <!-- <img id="profile-img" class="profile-img-card" src="img/avatar.png" /> -->
                <p class="profile-name"><?=$title?> </p>
            </div>
    
            <div class="modal-body">

                <select id="std_cou" name="std_cou" class="form-control" autofocus>
                <?php foreach ($cou_name as $course): ?>
                    <option value='<?=$course['cou_id']?>'> <?=$course['cou_name']?> </option>
                <?php endforeach; ?>
                </select>
                <input id="std_cou" name="std_cou" type="text" class="form-control" placeholder="Course" required="required">
                <input id="std_roll" name="std_roll" type="text" class="form-control" placeholder="Student Roll" required="required">
                <input id="std_batch" name="std_batch" type="text" class="form-control" placeholder="Attended Batch" required="required">
                
            
            </div>
            <div class="modal-footer">
                
                <button id="save" type="submit" class="btn btn-primary btn-block">Save</button>
                
            </div>
        </form>
            <!-- End # Login Form -->
    </div>
        <!-- End # DIV Form -->
        
</div>
