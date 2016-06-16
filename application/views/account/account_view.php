      

<h2><?php echo $title; ?></h2>
<div class="table-responsive">
    <table class="table table-hover table-striped ">
        <thead> 
            <tr class="info">
                <th>Course</th>
                <th>Batch</th>
                <th>Roll</th>
                <th>Regi. No</th>
                <th>Student Name</th>
                <th>Father's Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <!-- <th>Pass</th> -->
                <th>Admission Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="table-striped">
        <?php foreach ($std_list as $slist): ?>
            <tr>

                <?= '<td>'. $slist['cou_name']       . '</td>'; ?>
                <?= '<td>'. $slist['std_batch']     . '</td>'; ?>
                <?= '<td>'. $slist['std_roll']      . '</td>'; ?>
                <?= '<td>'. $slist['std_reg']       . '</td>'; ?>
                <?= '<td>'. $slist['std_name']      . '</td>'; ?>
                <?= '<td>'. $slist['std_fa']        . '</td>'; ?>
                <?= '<td>'. $slist['std_cont']      . '</td>'; ?>
                <?= '<td>'. $slist['std_email']     . '</td>'; ?>
                <!-- <?= '<td>'. $slist['std_pass']      . '</td>'; ?> -->
                <?= '<td>'. $slist['std_adm_date']  . '</td>'; ?>

                <?= '<td><a href="' . site_url('student/view/'.$slist['std_id']) . '" data-toggle="tooltip" data-placement="top" title="Edit"><img width="20px" height="20px" src="' . site_url('resource/img/edit.png') .'" alt="Do Edit"></a></td>'; ?> 
            </tr>
        </tbody>
            
    <?php endforeach; ?>

    </table>
</div>