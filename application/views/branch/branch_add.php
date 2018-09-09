
<div id="div-forms">    

    <div class="modal-header" align="center"> <p class="profile-name"><?= $title ?> </p>

    </div>

    <div class="col-sm-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= $sub_title ?>
                <span class="pull-right">
                    <a href="#" id="new_branch" class="btn btn-link label label-success">Add New</a>
                </span>
            </div>
            <!-- <div class="panel-body">
              Panel content
            </div> -->

            <table class="table table-hover table-striped" id="result">
                <thead> 
                    <tr>
                        <th>#</th>
                        <th>Branch Code</th>
                        <th>Branch Name</th>
                        <th>Address</th>
                        <th>Branch Cont.</th>
                        <th>Branch Email</th>
                        <th>Action</th>
                    </tr>
                </thead> 

                <tbody class="table-striped">
                <?php $counter = 0;?>
                    <?php foreach ($br_name as $brlist): ?>
                        <tr>
                            <td><?php echo ++$counter; ?></td>
                            <td><strong><?= $brlist['br_code'] ?></strong></td>
                            <td><?= $brlist['br_name'] ?></td>
                            <!-- <td><?= $brlist['br_addr1'] ?>,&nbsp;<?= $brlist['br_addr2'] ?>,&nbsp;<?= $brlist['br_dis_id'] ?>,&nbsp;<?= $brlist['br_zip'] ?></td> -->

                            <?php
                            echo '<td>';
                            echo $brlist['br_addr1'].',&nbsp;'. $brlist['br_addr2'] .',&nbsp;' . $brlist['br_dis_id'];

                            if($brlist['br_zip'] !== '') {
                                echo '&nbsp;-&nbsp;' . $brlist['br_zip'];    
                            }
                                                        
                            echo '</td>';
                            ?>

                            <td><?= $brlist['br_tel'] ?></td>
                            <td><?= $brlist['br_email'] ?></td>
                            <?= '<td><a href="#" data-toggle="tooltip" data-placement="top" title="Edit" class="Edit_branch" id="' . $brlist['br_code'] . '"><img width="20px" height="20px" src="' . site_url('resource/img/edit.png') . '" alt="Do Edit"></a></td>'; ?>

                        </tr>
                    <?php endforeach; ?>
                </tbody >
            </table>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="vandor_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal_title">Branch Information Entry</h4>
                </div>

                <form id="branch" action="<?= site_url('branch/addnew') ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="br_id" id="br_id">
                    <input type="hidden" name="op_type" id="op_type" value="save">

                    <div class="modal-body">
                        <input id="br_code" name="br_code" type="text" class="form-control" placeholder="Branch Code" required="required" class="form-control" autofocus>
                        <input id="br_name" name="br_name" type="text" class="form-control" placeholder="Branch Name" required="required" class="form-control" autofocus>
                        <input id="br_addr1" name="br_addr1" type="text" class="form-control" placeholder="Address Line 1" class="form-control">
                        <input id="br_addr2" name="br_addr2" type="text" class="form-control" placeholder="Address Line 2" class="form-control">
                        <input id="br_dis_id" name="br_dis_id" type="text" class="form-control" placeholder="District" class="form-control">
                        <input id="br_zip" name="br_zip" type="text" class="form-control" placeholder="Post Code" class="form-control">
                        <input id="br_tel" name="br_tel" type="text" class="form-control" placeholder="Telephone Number" class="form-control">
                        <input id="br_mob" name="br_mob" type="text" class="form-control" placeholder="Mobile Number" class="form-control">
                        <input id="br_email" name="br_email" type="text" class="form-control" placeholder="Branch Email address" class="form-control">
                        <input id="br_fax" name="br_fax" type="text" class="form-control" placeholder="Branch FAX Number"  class="form-control" value="">
                        <input id="br_kcp_name" name="br_kcp_name" type="text" class="form-control" placeholder="Key Contact Person (KCP)"  class="form-control" value="">
                        <input id="br_kcp_mob" name="br_kcp_mob" type="text" class="form-control" placeholder="KCP Mobile no"  class="form-control" value="">
                        <input id="br_kcp_email" name="br_kcp_email" type="text" class="form-control" placeholder="KCP Email address"  class="form-control" value="">


                    </div>
                    <div class="modal-footer">

                        <button id="save" type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</div>


<script>

    $(document).ready(function () {

        /**
         * Script for Edit Vandor Information
         * Modified by: Abid 
         * Date : 30 March 2016
         **/

        $("body").on("click", "#new_branch", function () {
            $("#vandor_edit").modal("show");
            clear();
        });

        $("body").on("click", ".Edit_branch", function () {
            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>branch/branch_details",
                data: {br_code: id},
                beforeSend: function () {
                },
                success: function (result) {

                    var data = jQuery.parseJSON(result);

                    $("#br_id").val(data.br_id);
                    $("#br_code").val(data.br_code);
                    $("#br_name").val(data.br_name);
                    $("#br_addr1").val(data.br_addr1);
                    $("#br_addr2").val(data.br_addr2);
                    $("#br_dis_id").val(data.br_dis_id);
                    $("#br_zip").val(data.br_zip);
                    $("#br_tel").val(data.br_tel);
                    $("#br_mob").val(data.br_mob);
                    $("#br_email").val(data.br_email);
                    $("#br_fax").val(data.br_fax);
                    $("#br_kcp_name").val(data.br_kcp_name);
                    $("#br_kcp_mob").val(data.br_kcp_mob);
                    $("#br_kcp_email").val(data.br_kcp_email);

                    $("#branch").attr("action", "<?php echo base_url(); ?>branch/update_branch");
                    $("#op_type").val("update");
                    $("#save").html("Update");

                    $("#modal_title").html("Branch Information Update Form");
                    $("#vandor_edit").modal("show");

                }
            });

        });

        function clear() {
        
            $("#br_id").val("");
            $("#br_name").val("");
            $("#br_addr").val("");
            $("#br_tel").val("");
            $("#br_mob").val("");
            $("#br_email").val("");
            $("#br_fax").val("");
            $("#br_kcp_name").val("");
            $("#br_kcp_mob").val("");
            $("#br_kcp_email").val("");

            $("#op_type").val("save");
            $("#save").html("Save");

            $("#modal_title").html("Branch Information Entry Form");
            $("#branch").attr("action", "<?php echo base_url(); ?>branch/addnew");

        }
        
        /*
         End [Edit Vandor Information]
         */


        // $.ajax({
        //     type: "GET",
        //     url: "<?php echo base_url(); ?>assets/get_category",
        //     data: {id: $(this).val()},
        //     beforeSend: function () {
        //         $("#br_at_id option:gt(0)").remove();
        //         $('#br_at_id').find("option:eq(0)").html("Please wait..");
        //     },
        //     success: function (data) {
        //         /*get response as json */
        //         $('#br_at_id').find("option:eq(0)").html("Select Category");
        //         var obj = jQuery.parseJSON(data);
        //         $(obj).each(function ()
        //         {
        //             var option = $('<option />');
        //             option.attr('value', this.value).text(this.label);
        //             $('#br_at_id').append(option);
        //         });
        //         /*ends */
        //     }
        // });

    });

</script>

