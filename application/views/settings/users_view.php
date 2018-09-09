
<div id="div-forms">    

    <div class="modal-header" align="center"> <p class="profile-name"><?= $title ?> </p>

    </div>

    <div class="col-sm-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= $sub_title ?>
                <span class="pull-right">
                    <a href="#" id="new_user" class="btn btn-link label label-success">Add New</a>
                </span>
            </div>
            <!-- <div class="panel-body">
              Panel content
            </div> -->

            <table class="table table-hover table-striped" id="result">
                <thead> 
                    <tr>
                        <th>#</th>
                        <th>User Login</th>
                        <th>User Name</th>
                        <th>User Contact</th>
                        <th>User Email</th>
                        <th>Access Level</th>
                        <th>Action</th>
                    </tr>
                </thead> 

                <tbody class="table-striped">
                <?php $counter = 0;?>
                    <?php foreach ($usr_name as $usrlist): ?>
                        <tr>
                            <td><strong><?php echo ++$counter; ?></strong></td>
                            <td><?= $usrlist['usr_login'] ?></td>
                            <td><?= $usrlist['usr_name'] ?></td>
                            <td><?= $usrlist['usr_cont'] ?></td>
                            <td><?= $usrlist['usr_email'] ?></td>
                            <td><?= ucfirst($usrlist['usr_access']) ?></td>
                            <td>
                            <?= '<a href="#" data-toggle="tooltip" data-placement="top" title="Edit" class="edit_user" id="' . $usrlist['usr_id'] . '"><img width="20px" height="20px" src="' . site_url('resource/img/edit.png') . '" alt="Do Edit"></a>'; ?>
							
							<?= '<a href="#" data-toggle="tooltip" data-placement="top" title="Change Password" class="edit_passwd" id="' . $usrlist['usr_id'] . '"><img width="20px" height="20px" src="' . site_url('resource/img/pin.png') . '" alt="Do Edit"></a>'; ?>
							</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody >
            </table>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="mdl_user_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal_title">User Information Entry</h4>
                </div>
                <?php echo validation_errors(); ?>
                <form id="users" action="<?= site_url('settings/users') ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="usr_id" id="usr_id">
                    <input type="hidden" name="op_type" id="op_type" value="save">

                    <div class="modal-body">
                        
                        <input id="usr_login" name="usr_login" type="text" class="form-control" placeholder="User Login" required="required" class="form-control" autofocus>
                        <input id="usr_passwd" name="usr_passwd" type="text" class="form-control" placeholder="User Password" class="form-control" >

                        <input id="usr_name" name="usr_name" type="text" class="form-control" placeholder="User Name" required="required" class="form-control">
                        <input id="usr_cont" name="usr_cont" type="text" class="form-control" placeholder="Contact Number" class="form-control">
                        <input id="usr_email" name="usr_email" type="text" class="form-control" placeholder="User Email Address" class="form-control">
                        <select id="usr_access" name="usr_access" class="form-control" autofocus>
                            <option value="admin">Admin</option>
                            <option value="purchase">Purchase</option>
                            <option value="store">Store</option>
                        </select>
                        
                    </div>
                    <div class="modal-footer">

                        <button id="save" type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <div class="modal fade" tabindex="-1" role="dialog" id="mdl_user_passwd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal_title">User Password Change</h4>
                </div>
                <?php echo validation_errors(); ?>
                <form id="frm_passwd" action="<?= site_url('settings/passwd') ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="id" id="id">

                    <div class="modal-body">
                        
                        <input id="login" name="login" type="text" class="form-control" placeholder="User Login" required="required" class="form-control" autofocus>
                        <input id="passwd" name="passwd" type="text" class="form-control" placeholder="User Password" class="form-control" required="required" autofocus>
                        
                    </div>
                    <div class="modal-footer">

                        <button id="btn_passwd" type="submit" class="btn btn-primary btn-block">Change Password</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>


<script>

    $(document).ready(function () {

        $("body").on("click", "#new_user", function () {
            $("#mdl_user_edit").modal("show");
            clear();
        });

        $("body").on("click", ".edit_user", function () {
            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>settings/user_details",
                data: {usr_id: id},
                beforeSend: function () {
                },
                success: function (result) {

                    var data = jQuery.parseJSON(result);

                    $("#usr_id").val(data.usr_id);
                    $("#usr_login").val(data.usr_login);
                    $("#usr_email").val(data.usr_email);
                    $("#usr_name").val(data.usr_name);
                    $("#usr_cont").val(data.usr_cont);
                    // $("#usr_passwd").val(data.usr_passwd);
                    $("#usr_access").val(data.usr_access);

                    $("#usr_passwd").attr("class", "hide");
                    $("#users").attr("action", "<?php echo base_url(); ?>settings/update_user");
                    $("#op_type").val("update");
                    $("#save").html("Update");

                    $("#modal_title").html("User Information Update Form");
                    $("#mdl_user_edit").modal("show");

                }
            });

        });


        $("body").on("click", ".edit_passwd", function () {
            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>settings/user_details",
                data: {usr_id: id},
                beforeSend: function () {
                },
                success: function (result) {

                    var data = jQuery.parseJSON(result);

                    $("#id").val(data.usr_id);
                    $("#login").val(data.usr_login);
                    // $("#usr_email").val(data.usr_email);
                    // $("#usr_name").val(data.usr_name);
                    // $("#usr_cont").val(data.usr_cont);
                    // $("#passwd").val(data.usr_passwd);
                    // $("#usr_access").val(data.usr_access);

                    // $("#usr_passwd").attr("class", "hide");
                    // $("#users").attr("action", "<?php echo base_url(); ?>settings/update_user");
                    // $("#op_type").val("update");
                    // $("#save").html("Update");

                    // $("#modal_title").html("User Information Update Form");
                    $("#mdl_user_passwd").modal("show");
                    // $("#mdl_user_passwd").find('#passwd').focus();

                }
            });

        });

        

        function clear() {
        
            $("#usr_id").val("");
            $("#usr_name").val("");
            $("#usr_passwd").val("");
            $("#usr_email").val("");
            $("#usr_cont").val("");

            $("#op_type").val("save");
            $("#save").html("Save");
            
            $("#usr_passwd").attr("required", "required");
            $("#usr_passwd").attr("class", "form-control ");


            $("#modal_title").html("User Information Entry Form");
            $("#mdl_user_edit").attr("action", "<?php echo base_url(); ?>settings/users");

        }
        
        /*
         End [Edit Vandor Information]
         */


        // $.ajax({
        //     type: "GET",
        //     url: "<?php echo base_url(); ?>assets/get_category",
        //     data: {id: $(this).val()},
        //     beforeSend: function () {
        //         $("#usr_at_id option:gt(0)").remove();
        //         $('#usr_at_id').find("option:eq(0)").html("Please wait..");
        //     },
        //     success: function (data) {
        //         /*get response as json */
        //         $('#usr_at_id').find("option:eq(0)").html("Select Category");
        //         var obj = jQuery.parseJSON(data);
        //         $(obj).each(function ()
        //         {
        //             var option = $('<option />');
        //             option.attr('value', this.value).text(this.label);
        //             $('#usr_at_id').append(option);
        //         });
        //         /*ends */
        //     }
        // });

    });

</script>

