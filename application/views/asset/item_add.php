
<!-- <div class="card "> -->
<div id="div-forms">	
	<!-- Begin # DIV Form -->
	
	<div class="modal-header" align="center"> <p class="profile-name"><?=$title?> </p>

	</div>

	<div class="col-sm-5">
		
		<!-- Begin # Login Form -->
		<?php echo validation_errors(); ?>
		<form id="login-form" action="<?=site_url('assets/item') ?>" method="post">
		
			<div class="modal-body">

          <select id="ast_at_id" name="ast_at_id" class="form-control" autofocus>
              <option value="">--Select--</option>
          </select>
			    <input id="ast_name" name="ast_name" type="text" class="form-control" placeholder="Item Name" required="required">
			
			</div>
			<div class="modal-footer">
				
				<button id="save" type="submit" class="btn btn-primary btn-block">Save</button>
				
			</div>
		</form>

			<!-- End # Login Form -->
	</div>
		<!-- End # DIV Form -->
		
	<!-- </div> -->
	<div class="col-sm-7">

		<div class="panel panel-primary">
		  <div class="panel-heading"><?=$sub_title?></div>
		  <!-- <div class="panel-body">
		    Panel content
		  </div> -->

		  <ul class="list-group">
			  
			  <table class="table table-hover table-striped" id="result">
          <thead > 
          <tr >
            <th>#</th>
            <th>Catetory</th>
            <th>Remarks</th>
          </tr>
          </thead> 

          <tbody class="table-striped">

          <?php foreach ($cat_name as $catlist): ?>
                  <!-- <?=site_url('assets/edit/'.$catlist['at_id'])?> -->
                  <!-- <a href="#" class="list-group-item"><?=$catlist['at_name']?></a> -->
                    

                    <!-- <a href="' . site_url('student/view/'.$slist['std_id']) . '" data-toggle="tooltip" data-placement="top" title="Edit"><img width="20px" height="20px" src="' . site_url('resource/img/edit.png') .'" alt="Do Edit"></a> -->
                    <tr>
            <td ><?=$catlist['at_id']?></td>
            <td><?=$catlist['at_name']?></td>
            <td><?=$catlist['at_remarks']?></td>
            <!-- <td width="30px"><a href="<?=site_url('assets/edit/'.$catlist['at_id'])?>" data-toggle="tooltip" data-placement="top" title="Edit"><img width="20px" height="20px" src="<?=site_url('resource/img/edit.png')?>" alt="Do Edit"></a></td> -->
          </tr>
                <?php endforeach; ?>
                </tbody >
              </table>
		<!-- <td width="30px"><a href="<?=site_url('assets/edit/'.$catlist['at_id'])?>" data-toggle="tooltip" data-placement="top" title="Edit"><img width="20px" height="20px" src="<?=site_url('resource/img/edit.png')?>" alt="Do Edit"></a></td> -->
			</ul>

		</div>

	</div>
		
</div>

<script>
  
  $(document).ready(function(){

        $.ajax({
      type: "GET",
      url: "<?php echo base_url();?>assets/get_category",
      data:{id:$(this).val()}, 
      beforeSend :function(){
        $("#ast_at_id option:gt(0)").remove(); 
        // $("#item option:gt(0)").remove();
        // $("#result tbody").remove(); 
        // $("#result thead").remove();
        
        $('#ast_at_id').find("option:eq(0)").html("Please wait..");
      },                         
      success: function (data) {
        /*get response as json */
         $('#ast_at_id').find("option:eq(0)").html("Select Category");
         $('#ast_at_id').attr('value','0');

        var obj=jQuery.parseJSON(data);
        $(obj).each(function()
        {
         var option = $('<option />');
         option.attr('value', this.value).text(this.label);           
         $('#ast_at_id').append(option);
       });  
        /*ends */
      }
    });


    /*Get the item  list */

    $('#ast_at_id').change(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>assets/get_item",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      // $("#item option:gt(0)").remove(); 
      $("#result tbody").remove(); 
      $("#result thead").remove();
    
      // $('#item').find("option:eq(0)").html("Please wait..");

        },                         
        success: function (data) {
          /*get response as json */
           // $('#item').find("option:eq(0)").html("Select Item");
           $('#ast_name').attr('placeholder','Item name');
           $('#ast_name').val("");

          var obj=jQuery.parseJSON(data);
          var th = '<thead><tr><th>#</th><th>item</th></tr></thead>';
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


  });

</script>