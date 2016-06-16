
<div id="div-forms">    

    <div class="modal-header" align="center"> <p class="profile-name"><?= $title ?> </p>

    </div>

    <div class="col-sm-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                &nbsp;
                <span class="pull-right">
                    <a href="#" id="btn_org_edit" class="btn btn-link label label-success">Edit Organization</a>
                </span>
            </div>
            <!-- <div class="panel-body">
              Panel content
            </div> -->

            <table class="table table-hover table-striped" id="result">
                <!--<thead> 
                    <tr>
                        <th>#</th>
                        <th>Vendor</th>
                        <th>Contact</th>
                        <th>KCP</th>
                        <th>KCP Contact</th>
                        <th>Action</th>
                    </tr>
                </thead> -->

                <tbody class="table-striped">

                    <?php //foreach ($org_info as $orginfo): ?>
                        <tr>
                            <!--<td><?= $org_info['org_id'] ?></td>-->
                            <td><?= $org_info['org_name'] ?></td>
                            <td><?= $org_info['org_name_s'] ?></td>
                            <td><?= $org_info['org_address'] ?></td>
                            <td><?= $org_info['org_tel'] ?></td>
                            <td><?= $org_info['org_mob'] ?></td>
                            <td><?= $org_info['org_fax'] ?></td>
                            <td><?= $org_info['org_email'] ?></td>
                            <td><?= $org_info['org_web'] ?></td>
                            <?= '<td><a href="#" data-toggle="tooltip" data-placement="top" title="Edit" class="Edit_org" id="'.$org_info['org_id'].'"><img width="20px" height="20px" src="' . site_url('resource/img/edit.png') . '" alt="Do Edit"></a></td>'; ?>
                        </tr>
                    <?php //endforeach; ?>
                </tbody >
            </table>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="mdl_org_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal_title">Organization Update Form</h4>
                </div>

                <form id="vendor" action="<?= site_url('settings/update_org') ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="org_id" id="org_id">
                    <!-- <input type="hidden" name="op_type" id="op_type" value="save"> -->

                    <div class="modal-body">
                        <!-- <select id="ven_at_id" name="ven_at_id" class="form-control" autofocus>
                            <option value="">--Select--</option>
                        </select> -->
                        <input id="org_name" name="org_name" type="text" class="form-control" placeholder="Organization Name" required="required" class="form-control" autofocus>
                        <input id="org_name_s" name="org_name_s" type="text" class="form-control" placeholder="Organization Short Name" class="form-control">
                        <input id="org_address" name="org_address" type="text" class="form-control" placeholder="Address" class="form-control">
                        <!-- <input id="org_dis_id" name="org_dis_id" type="text" class="form-control" placeholder="City" required="required" class="form-control"> -->
                        <input id="org_tel" name="org_tel" type="text" class="form-control" placeholder="Organization Telephone" class="form-control">
                        <input id="org_mob" name="org_mob" type="text" class="form-control" placeholder="Organization Mobile" class="form-control">
                        <input id="org_email" name="org_email" type="text" class="form-control" placeholder="Organization Email Address" class="form-control">
                        <input id="org_fax" name="org_fax" type="text" class="form-control" placeholder="FAX Number"  class="form-control" value="">
                        <input id="org_web" name="org_web" type="text" class="form-control" placeholder="Web site address"  class="form-control" value="">
                        
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

        $("body").on("click", "#btn_org_edit", function () {
            $("#mdl_org_edit").modal("show");
            clear();
        });

        $("body").on("click", ".Edit_org", function () {
            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>settings/get_org_info",
                data: {id: id},
                beforeSend: function () {
                },
                success: function (result) {

                    var data = jQuery.parseJSON(result);

                    $("#org_id").val(data.org_id);
                    $("#org_name").val(data.org_name);
                    $("#org_name_s").val(data.org_name_s);
                    $("#org_address").val(data.org_address);
                    // $("#org_dis_id").val(data.org_dis_id);
                    $("#org_tel").val(data.org_tel);
                    $("#org_mob").val(data.org_mob);
                    $("#org_email").val(data.org_email);
                    $("#org_fax").val(data.org_fax);
                    $("#org_web").val(data.org_web);

                    // $("#ven_at_id").val(data.ven_at_id);
                    // $("#vendor").attr("action", "<?php echo base_url(); ?>vendor/update_org");
                    // $("#op_type").val("update");
                    // $("#save").html("Update");

                    // $("#modal_title").html("Vendor Information Update Form");
                    $("#mdl_org_edit").modal("show");

                }
            });

        });

        function clear() {
        
            $("#org_id").val("");
            $("#org_name").val("");
            $("#ven_addr").val("");
            $("#ven_tel").val("");
            $("#ven_mob").val("");
            $("#ven_email").val("");
            $("#ven_fax").val("");
            $("#ven_web").val("");
            $("#ven_kcp_name").val("");
            $("#ven_kcp_mob").val("");
            $("#ven_kcp_email").val("");

            $("#op_type").val("save");
            $("#save").html("Save");

            $("#modal_title").html("Vendor Information Entry Form");
            $("#vendor").attr("action", "<?php echo base_url(); ?>vendor/addnew");

        }
        
        /*
         End [Edit Vandor Information]
         */


        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>assets/get_category",
            data: {id: $(this).val()},
            beforeSend: function () {
                $("#ven_at_id option:gt(0)").remove();
                $('#ven_at_id').find("option:eq(0)").html("Please wait..");
            },
            success: function (data) {
                /*get response as json */
                $('#ven_at_id').find("option:eq(0)").html("Select Category");
                var obj = jQuery.parseJSON(data);
                $(obj).each(function ()
                {
                    var option = $('<option />');
                    option.attr('value', this.value).text(this.label);
                    $('#ven_at_id').append(option);
                });
                /*ends */
            }
        });

    });

</script>

