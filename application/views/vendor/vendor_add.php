
<div id="div-forms">    

    <div class="modal-header" align="center"> <p class="profile-name"><?= $title ?> </p>

    </div>

    <div class="col-sm-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= $sub_title ?>
                <span class="pull-right">
                    <a href="#" id="new_vandor" class="btn btn-link label label-success">Add New</a>
                </span>
            </div>
            <!-- <div class="panel-body">
              Panel content
            </div> -->

            <table class="table table-hover table-striped" id="result">
                <thead> 
                    <tr>
                        <th>#</th>
                        <th>Vendor</th>
                        <th>Contact</th>
                        <th>KCP</th>
                        <th>KCP Contact</th>
                        <th>Action</th>
                    </tr>
                </thead> 

                <tbody class="table-striped">

                    <?php foreach ($ven_name as $venlist): ?>
                        <tr>
                            <td><?= $venlist['ven_id'] ?></td>
                            <td><?= $venlist['ven_name'] ?></td>
                            <td><?= $venlist['ven_tel'] ?></td>
                            <td><?= $venlist['ven_kcp_name'] ?></td>
                            <td><?= $venlist['ven_kcp_mob'] ?></td>
                            <?= '<td><a href="#" data-toggle="tooltip" data-placement="top" title="Edit" class="Edit_vandor" id="' . $venlist['ven_id'] . '"><img width="20px" height="20px" src="' . site_url('resource/img/edit.png') . '" alt="Do Edit"></a></td>'; ?>
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
                    <h4 class="modal-title" id="modal_title">Vendor Information Entry</h4>
                </div>

                <form id="vendor" action="<?= site_url('vendor/addnew') ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="ven_id" id="ven_id">
                    <input type="hidden" name="op_type" id="op_type" value="save">

                    <div class="modal-body">
                        <select id="ven_at_id" name="ven_at_id" class="form-control" autofocus>
                            <option value="">--Select--</option>
                        </select>
                        <input id="ven_name" name="ven_name" type="text" class="form-control" placeholder="Vendor Name" required="required" class="form-control" autofocus>
                        <input id="ven_addr" name="ven_addr" type="text" class="form-control" placeholder="Address" class="form-control">
                        <!-- <input id="ven_dis_id" name="ven_dis_id" type="text" class="form-control" placeholder="Model Number" required="required" class="form-control"> -->
                        <input id="ven_tel" name="ven_tel" type="text" class="form-control" placeholder="Telephone Number" class="form-control">
                        <input id="ven_mob" name="ven_mob" type="text" class="form-control" placeholder="Mobile Number" required="required" class="form-control">
                        <input id="ven_email" name="ven_email" type="text" class="form-control" placeholder="Vendor Email address" class="form-control">
                        <input id="ven_fax" name="ven_fax" type="text" class="form-control" placeholder="Vendor FAX Number"  class="form-control" value="">
                        <input id="ven_web" name="ven_web" type="text" class="form-control" placeholder="Web site address"  class="form-control" value="">
                        <input id="ven_kcp_name" name="ven_kcp_name" type="text" class="form-control" placeholder="Key Contact Person (KCP)"  class="form-control" value="">
                        <input id="ven_kcp_mob" name="ven_kcp_mob" type="text" class="form-control" placeholder="KCP Mobile no"  class="form-control" value="">
                        <input id="ven_kcp_email" name="ven_kcp_email" type="text" class="form-control" placeholder="KCP Email address"  class="form-control" value="">


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

        $("body").on("click", "#new_vandor", function () {
            $("#vandor_edit").modal("show");
            clear();
        });

        $("body").on("click", ".Edit_vandor", function () {
            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>vendor/vendor_details",
                data: {id: id},
                beforeSend: function () {
                },
                success: function (result) {

                    var data = jQuery.parseJSON(result);

                    $("#ven_id").val(data.ven_id);
                    $("#ven_name").val(data.ven_name);
                    $("#ven_addr").val(data.ven_addr);
                    $("#ven_tel").val(data.ven_tel);
                    $("#ven_mob").val(data.ven_mob);
                    $("#ven_email").val(data.ven_email);
                    $("#ven_fax").val(data.ven_fax);
                    $("#ven_web").val(data.ven_web);
                    $("#ven_kcp_name").val(data.ven_kcp_name);
                    $("#ven_kcp_mob").val(data.ven_kcp_mob);
                    $("#ven_kcp_email").val(data.ven_kcp_email);

                    $("#ven_at_id").val(data.ven_at_id);
                    $("#vendor").attr("action", "<?php echo base_url(); ?>vendor/update_vandor");
                    $("#op_type").val("update");
                    $("#save").html("Update");

                    $("#modal_title").html("Vendor Information Update Form");
                    $("#vandor_edit").modal("show");

                }
            });

        });

        function clear() {
        
            $("#ven_id").val("");
            $("#ven_name").val("");
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

