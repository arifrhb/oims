
<div id="div-forms">    

<div class="modal-header" align="center"> <p class="profile-name"><?= $title ?> </p></div>
    <?php echo validation_errors(); ?>
<!-- Start Panel Group  -->

<div class="panel-group">
  
    <!-- Purchase information panel -->
    <div class="panel panel-primary ">  <!-- form-inline -->
        <div class="panel-heading"> <!-- Serial / Tag No :  -->
        <form action='#' method="post" id="search-frm" class="form-inline">
            <div class="col-lg-4 input-group">
              <input id="str_sl" name="str_sl" type="text" class="form-control" placeholder="Serial / Tag No..." required="required" autofocus>
              <span class="input-group-btn">
                <button class="btn btn-default" type="button" id='btn_sl_search'>
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    &nbsp;Search!</button>
              </span>
            </div><!-- /input-group -->
        </form>
        </div>
        <table class="table table-hover table-striped" id="tbl_main_store">
            <thead> 
                <tr>
                    <th>Asset Serial</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Cur. Loc</th>
                    <th>New Loc</th>
                    <th>Action</th>
                </tr>
            </thead> 

            <tbody class="table-striped">

            </tbody >
        </table>
        <div class="panel-footer"></div>
    </div>
        <!-- End purchase information panel -->
        


<!--     <div class="panel panel-primary">
        
        <div class="panel-body" >
        <table class="table table-hover table-striped" id="tbl_update_store">
            <thead> 
                <tr>
                    <th>Asset Serial</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Distribute to</th>
                </tr>
            </thead> 

            <tbody class="table-striped">

            </tbody >
        </table>
        </div>
        
    </div> -->

</div> <!-- End Panel Group -->


</div>


<script>

$(document).ready(function () {
//load asset category name
    // $.ajax({
    //     type: "GET",
    //     url: "<?php echo base_url(); ?>purchase/get_category",
    //     data: {id: $(this).val()},
    //     beforeSend: function () {
    //         $("#str_at_id  option:gt(0)").remove();
    //         $("#str_ast_id option:gt(0)").remove();
    //         $("#str_bnd_id option:gt(0)").remove();
    //         $("#str_mod_id option:gt(0)").remove();
    //         $("#str_ven_id option:gt(0)").remove();

    //         $('#str_at_id').find("option:eq(0)").html("Please wait..");
    //     },
    //     success: function (data) {
    //         /*get response as json */
    //         $('#pur_at_id').find("option:eq(0)").html("Select Category");
    //         var obj = jQuery.parseJSON(data);
    //         $(obj).each(function ()
    //         {
    //             var option = $('<option />');
    //             option.attr('value', this.value).text(this.label);
    //             $('#pur_at_id').append(option);
    //         });
    //         /*ends */
    //     }
    // });

        // function get_pur_details(str_pur_id) {
            // $.ajax({
                // url: "<?php echo base_url(); ?>Purchase/pur_store",
                // type: "POST",
                // data: {str_pur_id: str_pur_id},
                // success: function (result) {
                    // var obj = jQuery.parseJSON(result);
                    // console.log(obj);
                // }
            // });
        // }

        
}); //ON LOAD DOCUMENT.READY FUNCTION

    /*Search via serial number*/
    $("body").on("click", "#btn_sl_search", function () {
        // var data = $("#purchase_form").serialize();
        var str_sl = $("#str_sl").val();

        $.ajax({

            type: "POST",
            url: "<?php echo base_url(); ?>store/get_serial_wise_item",
            data: {str_sl: str_sl},
            beforeSend: function () {
                $("#tbl_main_store tbody").remove();
                $("#tbl_main_store thead").remove();

            },
            success: function (data) {

                var heading = "<thead><tr><th>Asset Serial</th><th>Name</th><th>Brand</th><th>Model</th><th>Cur. Loc</th><th>New Loc</th><th>Action</th></thead>";
                $('#tbl_main_store').append(heading);

                /*get response as json */
                var obj = jQuery.parseJSON(data);

                $(obj).each(function ()
                {

                    var str_id      = "<td>" + this.str_id      + "</td>";
                    var str_sl      = "<td>" + this.str_sl      + "</td>";
                    var ast_name    = "<td>" + this.ast_name    + "</td>";
                    var bnd_name    = "<td>" + this.bnd_name    + "</td>";
                    var mod_name    = "<td>" + this.mod_name    + "</td>";
                    var br_name     = "<td>" + this.br_name     + "</td>";
                    var br_new      = "<td><select id='new_loc' name='new_loc' class=''><option value='001'>Distribute to</option></select></td>";
                    var br_action   = "<td><a href='#' data-toggle='tooltip' data-placement='top' title='Update Location' class='view_details btn btn-link label label-primary' id='loc_update'><img width='25px' alt='Update' src='<?php echo site_url('/resource/img/tick.png/');?>' >&nbsp; Distribute</a></td>";
                    
                    $('#tbl_main_store').append('<tr>' + str_sl + ast_name + bnd_name + mod_name + br_name + br_new + br_action + '</tr>');
                });

                // 
                $.ajax({

                    type: "POST",
                    url: "<?php echo base_url(); ?>store/get_branch",
                    // data: {id: str_pur_id},
                    beforeSend: function () {
                        
                        // $("#tbl_store_info tbody").remove();
                    },
                    success: function (data) {
                        /*get response as json */
                        var obj = jQuery.parseJSON(data);

                        $(obj).each(function ()
                        {
                            var option = $('<option />');
                             option.attr('value', this.br_code).text(this.br_name);           
                             $('#new_loc').append(option);
                            
                        });
                    }
            
                });
                // 

                $("#new_loc").focus();
            }
        });
    });


//Item submit function  
    $("body").on("click", "#loc_update", function () {
        // var data = $("#purchase_form").serialize();
        var str_sl = $("#str_sl").val();
        var new_loc = $("#new_loc").val();

        $.ajax({
            url: "<?php echo base_url(); ?>store/update_location",
            data: {str_sl: str_sl, new_loc: new_loc},
            type: "post",
            success: function () {
                $.ajax({

                    type: "POST",
                    url: "<?php echo base_url(); ?>store/get_serial_wise_item",
                    data: {str_sl: str_sl},
                    beforeSend: function () {
                        // $("#tbl_update_store tbody").remove();
                        $("#tbl_main_store thead").remove();
                        $("#tbl_main_store tbody").remove();
                    },
                    success: function (data) {

                        var heading = "<thead><tr><th>Asset Serial</th><th>Name</th><th>Brand</th><th>Model</th><th>Distribute to</th></tr></thead>";
                        $('#tbl_main_store').append(heading);
                        /*get response as json */
                        var obj = jQuery.parseJSON(data);

                        $(obj).each(function ()
                        {
                            var str_id      = "<td>" + this.str_id      + "</td>";
                            var str_sl      = "<td>" + this.str_sl      + "</td>";
                            var ast_name    = "<td>" + this.ast_name    + "</td>";
                            var bnd_name    = "<td>" + this.bnd_name    + "</td>";
                            var mod_name    = "<td>" + this.mod_name    + "</td>";
                            var br_name     = "<td>" + this.br_name     + "</td>";
                            
                            $('#tbl_main_store').append('<tr>' + str_sl + ast_name + bnd_name + mod_name + br_name  + '</tr>');
                        });

                    }
                });

                $("#str_sl").val("");
                // $("#tbl_main_store tbody").remove();
                $("#str_sl").focus();
            }
        });
    });


</script>