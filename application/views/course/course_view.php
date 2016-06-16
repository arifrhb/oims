      

<h2><?php echo $title; ?></h2>
<div class="table-responsive">
    <table class="table table-hover table-striped ">
        <thead> 
            <tr class="info">
                <th>SN</th>
                <th>Course Name</th>
                <th>Course Title</th>
                <th>Year</th>
                <th>Semester</th>
                <!-- <th>Shift</th> -->
                <th>Course Fee</th>
                <!-- <th>Update By ID</th>
                <th>Update By Name</th> -->
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="table-striped">
            <?php foreach ($cou_list as $coulist): ?>
                <tr>
                    <?= '<td>'. $coulist['cou_id']      . '</td>'; ?>
                    <?= '<td>'. $coulist['cou_name']    . '</td>'; ?>
                    <?= '<td>'. $coulist['cou_title']   . '</td>'; ?>
                    <?= '<td>'. $coulist['cou_year']    . '</td>'; ?>
                    <?= '<td>'. $coulist['cou_sem']     . '</td>'; ?>
                    <!-- <?= '<td>'. $coulist['cou_shift']   . '</td>'; ?> -->
                    <?= '<td>'. $coulist['cou_cost']    . '</td>'; ?>
                    <!-- <?= '<td>'. $coulist['update_by']   . '</td>'; ?>
                    <?= '<td>'. $coulist['usr_name']    . '</td>'; ?> -->
                    <?= '<td><a href="' . site_url('course/view/'.$coulist['cou_id']) . '"data-toggle="tooltip" data-placement="top" title="Edit"><img width="20px" height="20px" src="' . site_url('resource/img/edit.png') .'" alt="Do Edit"></a></td>';?> 
                </tr>            
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

