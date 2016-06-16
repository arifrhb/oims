
<div id="div-forms">    

    <div class="modal-header" align="center"> <p class="profile-name"><?= $title ?> </p></div>
    <?php echo validation_errors(); ?>
<!-- Start Panel Group  -->
<div class="panel-group">
  
    <!-- Purchase information panel -->
    <div class="panel panel-primary form-inline">
        <div class="panel-heading"> Select Purchase ID
            <select id="pur_id" name="pur_id" class="form-control" >
                <option value="0">--Select--</option>
                <?php foreach ($pur_id as $purlist): ?>
                    <option value="<?= $purlist['pur_id'] ?>">
                    WO - <?= $purlist['pur_wo_no'] ?>,&nbsp;Bill - <?= $purlist['pur_bill_no'] ?>
                  </option>
                <?php endforeach; ?>
            </select>
            <span class="pull-right ">
                <button href="#" id="purchase_new" class="btn label label-success ">New Purchase</button>
            </span>
        </div>
        <table class="table table-hover table-striped" id="tbl_pur_info">
            <thead> 
                <tr>
                    <th>#</th>
                    <th>Work Oder No</th>
                    <th>Date</th>
                    <th>Bill No</th>
                    <th>Bill Date</th>
                    <th>Purchase Type</th>
                    <th>Vendor Name</th>
                </tr>
            </thead> 

            <tbody class="table-striped">

            </tbody >
        </table>
		<div class="panel-footer"></div>
    </div>
        <!-- End purchase information panel -->
		
<form action='#' method="post" id="purchase_form"> 

<!-- Store entry panel -->
    <div class="panel panel-primary form-inline">
	
	<div class="panel-body " >
	<span class="col-md-11 col-lg-11">
	<div class="form-inline ">
	
        <div class="form-group hide"> <!-- hide  -->
            <label for="pur_id" >Pur. ID</label><br>
            <input id="str_pur_id" name="str_pur_id" class="form-control input-sm" value="">
        </div>

        <div class="form-group">
            <label for="asset_name" >Asset Name</label><br>
            <select id="str_ast_id" name="str_ast_id" class="form-control input-sm">
                <option value="0">--Select--</option>
            </select>
        </div>
        <div class="form-group">
            <label for="asset_brand" >Brand</label><br>
            <select id="str_bnd_id" name="str_bnd_id" class="form-control input-sm">
                <option value="0">--Select--</option>
            </select>
        </div>
        <div class="form-group">
            <label for="asset_model" >Model</label><br>
            <select id="str_mod_id" name="str_mod_id" class="form-control input-sm">
                <option value="0">--Select--</option>
            </select>
        </div>
        <div class="form-group">
            <label for="serial_no">Serial/ Tag/ Holding</label><br>
            <input id="str_sl" name="str_sl" class="form-control input-sm" onkeydown="upper(this.id)">
        </div>
        <div class="form-group">
            <label for="unit_price" >Unit Price</label><br>
            <input id="str_unt_price" name="str_unt_price" class="form-control input-sm">
        </div>
        <div class="form-group">
            <label for="qnty">Quantity</label><br>
            <input id="str_qnty" name="str_qnty" class="form-control input-sm" value='1'>
        </div>
        <div class="form-group">
            <label for="exp_date">Expire Date</label><br>
            <input type ='date' id="str_exp_date" name="str_exp_date" class="form-control input-sm">
        </div>
        <div class="form-group">
            <label for="w_pre" >Warrenty Pre</label><br>
            <input type ='text' id="str_w_pre" name="str_w_pre" class="form-control input-sm">
        </div>
        <!-- <div class="form-group">
            <label for="location">Location</label><br>
            <select id="str_loc" name="str_loc" class="form-control input-sm">
                <?php foreach ($branch_list as $brlist): ?>
            <option value="<?= $brlist['br_code'] ?>">
              <?= $brlist['br_code'] ?>&nbsp;-&nbsp;<?= $brlist['br_name'] ?>
            </option>
            <?php endforeach; ?>
            </select>
        </div> -->
	</div>
	</span>
	<span class="pull-right col-md-1 col-lg-1">   
        <a href="#" class="btn btn-success" id="purchase_submit">Add</a>
    </span>
	</div>
	
    </div>
	
</form> 

    <div class="panel panel-primary form-inline">
        
        <div class="panel-body" id="purchase_details">
			<table class="table table-hover table-striped" id="tbl_store_info">
              <thead> 
                <tr>    
                    <th>Asset Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Serial / Tag No</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Expire Date</th>
                    <th>Warrenty</th>
                    <th>Location</th>
                </tr>
              </thead>
			 
              <tbody >

              </tbody >
            </table>
        </div>
		<!-- <div class="panel-footer"></div> -->
		
    </div><!-- End Store entry panel -->

</div> <!-- End Panel Group -->
    <div class="modal fade" tabindex="-1" role="dialog" id="purchase_entry">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal_title">Purchase Information Entry</h4>
                </div>

                <form id="vendor" action="<?= site_url('purchase/newpur') ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <input type="text" class="form-control" id="pur_wo_no" name="pur_wo_no" placeholder="Work Order No" onkeydown="upper(this.id)" >

                        <input type="date" class="form-control" id="pur_wo_date" name="pur_wo_date" placeholder="Work Order Date">

                        <select id="pur_at_id" name="pur_at_id" class="form-control" >
                            <option value="">--Select--</option>
                        </select>

                        <select id="pur_ven_id" name="pur_ven_id" class="form-control">
                            <option value="">--Select--</option>
                        </select>

                        <input type="text" class="form-control" id="pur_bill_no" name="pur_bill_no" placeholder="Bill Number" onkeydown="upper(this.id)">

                        <input type="date" class="form-control" id="pur_bill_date"  name="pur_bill_date" placeholder="Bill date" >

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
//load asset category name
	$.ajax({
		type: "GET",
		url: "<?php echo base_url(); ?>purchase/get_category",
		data: {id: $(this).val()},
		beforeSend: function () {
			$("#str_at_id  option:gt(0)").remove();
			$("#str_ast_id option:gt(0)").remove();
			$("#str_bnd_id option:gt(0)").remove();
			$("#str_mod_id option:gt(0)").remove();
			$("#str_ven_id option:gt(0)").remove();

			$('#str_at_id').find("option:eq(0)").html("Please wait..");
		},
		success: function (data) {
			/*get response as json */
			$('#pur_at_id').find("option:eq(0)").html("Select Category");
			var obj = jQuery.parseJSON(data);
			$(obj).each(function ()
			{
				var option = $('<option />');
				option.attr('value', this.value).text(this.label);
				$('#pur_at_id').append(option);
			});
			/*ends */
		}
	});

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


//Show purchase infor entry form
    $("body").on("click", "#purchase_new", function () {
        $("#purchase_entry").modal("show");
         clear();
    });


    function clear() {
        
            $("#pur_wo_no").val("");
            $("#pur_wo_date").val("");
            $("#pur_bill_no").val("");
            $("#pur_bill_date").val("");

            $("#pur_wo_no").focus();


        }


//Item submit function	
	$("body").on("click", "#purchase_submit", function () {
		var data = $("#purchase_form").serialize();
		var str_pur_id = $("#str_pur_id").val();

		$.ajax({
			url: "<?php echo base_url(); ?>Purchase/purchase_add",
			data: data,
			type: "post",
			success: function () {
                $('#str_ast_id').focus();
                // $("#str_ast_id option:gt(0)").remove();
                // $("#str_bnd_id option:gt(0)").remove();
                // $("#str_mod_id option:gt(0)").remove();

                $.ajax({

                    ////start abid
    				// url: "<?php echo base_url(); ?>Purchase/pur_store",
    				// type: "POST",
    				// data: {str_pur_id: str_pur_id},
    				// success: function (result) {
    				// 	var obj = jQuery.parseJSON(result);
    					
    				// 	$.each(obj,function(k,v){
    				// 		$.each(v,function(key,value){
    				// 			$("#purchase_details").append("<br />"+key+" : "+value);
    				// 		})
    				//    })
    				// } //end abid

                    type: "POST",
                    url: "<?php echo base_url(); ?>purchase/get_srote_info",
                    data: {id: str_pur_id},
                    beforeSend: function () {
                        
                        $("#tbl_store_info tbody").remove();
                    },
                    success: function (data) {
                        /*get response as json */
                        var obj = jQuery.parseJSON(data);

                        $(obj).each(function ()
                        {
                            var str_id = "<td>" + this.str_id + "</td>";
                            var str_pur_id = "<td>" + this.str_pur_id + "</td>";
                            var str_ast_id = "<td>" + this.str_ast_id + "</td>";
                            var str_bnd_id = "<td>" + this.str_bnd_id + "</td>";
                            var str_mod_id = "<td>" + this.str_mod_id + "</td>";
                            var str_sl = "<td>" + this.str_sl + "</td>";
                            var str_qnty = "<td>" + this.str_qnty + "</td>";
                            var str_unt_price = "<td>" + this.str_unt_price + "</td>";
                            var str_exp_date = "<td>" + this.str_exp_date + "</td>";
                            var str_w_pre = "<td>" + this.str_w_pre + "</td>";
                            var str_loc = "<td>" + this.str_loc + "</td>";
                            
                            $('#tbl_store_info').append('<tr>' + str_ast_id + str_bnd_id + str_mod_id  + str_sl + str_unt_price + str_qnty +  str_exp_date + str_w_pre + str_loc +'</tr>');
                        });
                    }
            
    			});
			}
		});
	});
		
		
//get purchase information details 
    $('body').on('change', '#pur_id', function () {
        
		$.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>purchase/get_pur_info",
            data: {id: $(this).val()},
            beforeSend: function () {
                $("#str_ast_id option:gt(0)").remove();
                $("#str_bnd_id option:gt(0)").remove();
                $("#str_mod_id option:gt(0)").remove();
                $("#tbl_pur_info tbody").remove();

            },
            success: function (data) {
                /*get response as json */
                var obj = jQuery.parseJSON(data);

                $(obj).each(function ()
                {

                    var pur_id = "<td>" + this.pur_id + "</td>";
                    var pur_wo_no = "<td>" + this.pur_wo_no + "</td>";
                    var pur_wo_date = "<td>" + this.pur_wo_date + "</td>";
                    var pur_bill_no = "<td>" + this.pur_bill_no + "</td>";
                    var pur_bill_date = "<td>" + this.pur_bill_date + "</td>";
                    var pur_at_id = "<td>" + this.pur_at_id + "</td>";
                    var pur_ven_id = "<td>" + this.pur_ven_id + "</td>";
                    $('#tbl_pur_info').append('<tr>' + pur_id + pur_wo_no + pur_wo_date + pur_bill_no + pur_bill_date + pur_at_id + pur_ven_id + '</tr>');
                });

                $('#str_ast_id').focus();
            }
        });
        
		
//get item list based on pur_id
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>purchase/get_pur_based_item",
            data: {id: $(this).val()},
            beforeSend: function () {
                // $("#str_ast_id option:gt(0)").remove();
                // $("#str_bnd_id option:gt(0)").remove();
                // $("#str_mod_id option:gt(0)").remove();
                $("#result tbody").remove();
                $("#result thead").remove();
                $('#str_ast_id').find("option:eq(0)").html("Please wait..");
            },
            success: function (data) {
                /*get response as json */
                $('#str_ast_id').find("option:eq(0)").html("Select Item");
                var obj = jQuery.parseJSON(data);

                $(obj).each(function ()
                {
                    var option = $('<option />');
                    option.attr('value', this.ast_id).text(this.ast_name);
                    $('#str_ast_id').append(option);

                });

                /*ends */
            }
        });
		
		//item wise display start
		$("#str_pur_id").val($(this).val());
		var str_pur_id = $(this).val();
		
		// $.ajax({
			// url: "<?php echo base_url(); ?>Purchase/pur_store",
			// type: "POST",
			// data: {str_pur_id: str_pur_id},
			// success: function (result) {
				// var obj = jQuery.parseJSON(result);
				
				// $.each(obj,function(k,v){
					// $.each(v,function(key,value){
						// $("#purchase_details").append("<br />"+key+" : "+value);
					// })
				// })
			// }
		// });
		
		//item wise display end
		
		
		
//testing code for item wise display
		$.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>purchase/get_srote_info",
            data: {id: $(this).val()},
            beforeSend: function () {
                $("#str_ast_id option:gt(0)").remove();
                $("#str_bnd_id option:gt(0)").remove();
                $("#str_mod_id option:gt(0)").remove();
                $("#tbl_store_info tbody").remove();
            },
            success: function (data) {
                /*get response as json */
                var obj = jQuery.parseJSON(data);

                $(obj).each(function ()
                {
                    var str_id = "<td>" + this.str_id + "</td>";
                    var str_pur_id = "<td>" + this.str_pur_id + "</td>";
                    var str_ast_id = "<td>" + this.str_ast_id + "</td>";
                    var str_bnd_id = "<td>" + this.str_bnd_id + "</td>";
                    var str_mod_id = "<td>" + this.str_mod_id + "</td>";
                    var str_sl = "<td>" + this.str_sl + "</td>";
                    var str_qnty = "<td>" + this.str_qnty + "</td>";
                    var str_unt_price = "<td>" + this.str_unt_price + "</td>";
                    var str_exp_date = "<td>" + this.str_exp_date + "</td>";
                    var str_w_pre = "<td>" + this.str_w_pre + "</td>";
                    var str_loc = "<td>" + this.str_loc + "</td>";
                    
                    $('#tbl_store_info').append('<tr>' + str_ast_id + str_bnd_id + str_mod_id + str_sl + str_unt_price + str_qnty +  str_exp_date + str_w_pre + str_loc +'</tr>');
                });
            }
        });		
		//end testing code for item wise display
		
		
	}); //End on change', '#pur_id


/*Get the Vendor list */
    $('#pur_at_id').change(function () {
		
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>purchase/get_vendors",
            data: {id: $(this).val()},
            beforeSend: function () {
                $("#pur_ven_id option:gt(0)").remove();
                $('#pur_ven_id').find("option:eq(0)").html("Please wait..");
            },
            success: function (data) {
                /*get response as json */
                $('#pur_ven_id').find("option:eq(0)").html("Select Vendor");
                var obj = jQuery.parseJSON(data);

                $(obj).each(function ()
                {
                    var option = $('<option />');
                    option.attr('value', this.ven_id).text(this.ven_name);
                    $('#pur_ven_id').append(option);

                });
                /*ends */
            }
        });

    });

/*get the brand list*/
    $('#str_ast_id').change(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>purchase/get_brand",
            data: {id: $(this).val()},
            beforeSend: function () {
                $("#str_bnd_id option:gt(0)").remove();
                $("#str_mod_id option:gt(0)").remove();
                $("#str_sl").val('');
                $("#str_unt_price").val('');
                $("#str_qnty").val('');
                $("#str_exp_date").val('');
                $("#str_w_pre").val('');


            
                $('#str_bnd_id').find("option:eq(0)").html("Please wait..");

            },
            success: function (data) {
                /*get response as json */
                $('#str_bnd_id').find("option:eq(0)").html("Select Brand");
                var obj = jQuery.parseJSON(data);

                $(obj).each(function ()
                {
                    var option = $('<option />');
                    option.attr('value', this.bnd_id).text(this.bnd_name);
                    $('#str_bnd_id').append(option);

                });
                /*ends */
            }
        });
    });


    /*get the model list*/
    $('#str_bnd_id').change(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>purchase/get_model",
            data: {id: $(this).val()},
            beforeSend: function () {
                $("#str_mod_id option:gt(0)").remove();

                $('#str_mod_id').find("option:eq(0)").html("Please wait..");

            },
            success: function (data) {
                /*get response as json */
                $('#str_mod_id').find("option:eq(0)").html("Select Model");
                var obj = jQuery.parseJSON(data);

                $(obj).each(function ()
                {
                    var option = $('<option />');
                    option.attr('value', this.mod_id).text(this.mod_name);
                    $('#str_mod_id').append(option);

                });

                /*ends */
            }
        });
    });


      /*Get the item list */
  $('#pur_at_id').change(function(){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url();?>purchase/get_item",
      data:{id:$(this).val()}, 
      beforeSend :function(){
        // $("#item option:gt(0)").remove();
        // $("#brand option:gt(0)").remove();
        // $("#result tbody").remove(); 
        // $("#result thead").remove();
    
        $('#item').find("option:eq(0)").html("Please wait..");

      },                         
      success: function (data) {
        /*get response as json */
         $('#item').find("option:eq(0)").html("Select Item");
        var obj=jQuery.parseJSON(data);
        var th = '<thead><tr><th>#</th><th>Item</th></tr></thead>';
          $('#result').append(th);
        $(obj).each(function()
        {
         var option = $('<option />');
         option.attr('value', this.ast_id).text(this.ast_name);           
         $('#item').append(option);

        var tr="<tr>";
        var td1="<td>"+ this.ast_id +"</td>";
        var td2="<td>"+ this.ast_name +"</td></tr>";
         $('#result').append(tr+td1+td2);

       });  

        /*ends */
      }
    });
  });



</script>