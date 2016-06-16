
<div id="div-forms">    

    <div class="modal-header" align="center"> <p class="profile-name"><?= $title ?> </p>

    </div>

    <div class="panel-group">

        <div class="panel panel-primary form-inline">
            <div class="panel-heading">  <?= $sub_title ?>
            <!-- Select Asset Type : 
            <select id="category" name="category" class="form-control" >
                <option value="">--All Available--</option>
                <?php foreach ($cat_name as $catlist): ?>
                    <option value="<?= $catlist['at_id'] ?>"><?= $catlist['at_name'] ?>
                  </option>
                <?php endforeach; ?>
            </select>-->
            <span class="pull-right ">
                <!-- <button href="#" id="purchase_new" class="btn label label-success ">New Purchase</button> -->
                <a href="#" onclick="self.close()" class="btn  label btn-danger">Close this Window</a>
            </span>
        </div>
            <!-- <div class="panel-body">
              Panel content
            </div> -->

            <table class="table table-hover table-striped" id="tbl_store_info">
                <thead> 
                    <tr>
                        <th>Asset Name</th>
                        <th>Serial Number</th>
                        <th>Expire Date</th>
                    </tr>
                </thead> 

                <tbody >
                    <?php foreach ($str_list as $strlist): ?>
                        <tr>
                            <!-- <td><?= $strlist['str_ast_id'] ?></td> -->
                            <td><?= $strlist['ast_name'] ?></td>
                             <td><?= $strlist['str_sl'] ?></td>
                             <td><?= $strlist['str_exp_date'] ?></td>
                             

                            <!-- <?='<td><a href="' . site_url('store/itemdetails').'/' . $strlist['str_ast_id'] . '" data-toggle="tooltip" data-placement="top" title="View Details of '. $strlist['ast_name'] .'" class="Edit_vandor" id="' . $strlist['str_ast_id'] . '"><img width="20px"  src="' . site_url('resource/img/view.png') . '" alt="View"></a></td>';?> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody >
            </table>
        </div>
    </div>


</div>


<script>

    $(document).ready(function () {


    });

</script>

