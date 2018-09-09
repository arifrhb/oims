
<div id="div-forms">    

    <div class="modal-header" align="center"> <p class="profile-name"><?= $title ?> </p>

    </div>

    <div class="panel-group">

        <div class="panel panel-primary form-inline">
            <div class="panel-heading"> <!-- <?= $sub_title ?> -->
            Select Asset Type : 
            <select id="category" name="category" class="form-control" >
                <option value="">--All Available--</option>
                <?php foreach ($cat_name as $catlist): ?>
                    <option value="<?= $catlist['at_id'] ?>"><?= $catlist['at_name'] ?>
                  </option>
                <?php endforeach; ?>
            </select>
            <span class="pull-right hide">
                <button href="#" id="purchase_new" class="btn label label-success ">New Purchase</button>
            </span>
        </div>
            <!-- <div class="panel-body">
              Panel content
            </div> -->

            <table class="table table-hover table-striped" id="tbl_store_info">
                <thead> 
                    <tr>
                        <th>Asset Name</th>
                        <th>Present Status</th>
                        <th>Action</th>
                    </tr>
                </thead> 

                <tbody >

                    <?php foreach ($str_list as $strlist): ?>
                        <tr>
                            <!-- <td><?= $strlist['str_ast_id'] ?></td> -->
                            <td><?= $strlist['ast_name'] ?></td>
                             <td><?= $strlist['str_total'] ?></td>
                            <?='<td><a href="' . site_url('store/pendingdetails').'/' . $strlist['str_ast_id'] . '" data-toggle="tooltip" data-placement="top" title="View Details of '. $strlist['ast_name'] .'" class="Edit_vandor" id="' . $strlist['str_ast_id'] . '" target="_top"><img width="20px"  src="' . site_url('resource/img/view.png') . '" alt="View"></a></td>';?>
                        </tr>
                    <?php endforeach; ?>
                </tbody >
            </table>
        </div>
    </div>

</div>


<script>

    $(document).ready(function () {

        $("body").on("change", "#category", function () {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>store/get_srote_pending_info",
                data: {at_id: $(this).val()},
                beforeSend: function () {
                    $("#tbl_store_info tbody").remove();
                },
                success: function (data) {
                    /*get response as json */
                    var obj = jQuery.parseJSON(data);

                    $(obj).each(function ()
                    {
                        var ast_name  = "<td>" + this.ast_name + "</td>";
                        var str_total  = "<td>" + this.str_total + "</td>";

                        var act_edit  = "<td><a href='<?php echo site_url('store/itemdetails') .'/'?>"+ this.str_ast_id +"' target='_top' data-toggle='tooltip' data-placement='top' title='View Details "+ this.ast_name +"  ' class='view_details' ><img width='20px' src='<?php echo site_url('/resource/img/view.png/');?>' > </a></td>";

                        $('#tbl_store_info').append('<tr>' + ast_name + str_total + act_edit + '</tr>');
                    });
                    /*End of json response*/
                }
                
            });     
        });

    });

</script>

