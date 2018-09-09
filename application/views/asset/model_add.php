
<!-- <div class="card "> -->
<div id="div-forms">    
    <!-- Begin # DIV Form -->
    
    <div class="modal-header" align="center"> <p class="profile-name"><?=$title?> </p>

    </div>

    <div class="col-sm-5">
        
        <!-- Begin # Login Form -->
        <?php echo validation_errors(); ?>

        <form id="login-form" action="<?=site_url('assets/model') ?>" method="post" class="form-horizontal">
        
            <div class="modal-body">

                <select id="ast_at_id" name="ast_at_id" class="form-control" autofocus>
                    <option value="">--Select--</option>
                </select>

                <select id="item" name="bnd_ast_id" class="form-control">
                    <option value="">--Select--</option>
                </select>

                <select id="brand" name="mod_bnd_id" class="form-control">
                    <option value="">--Select--</option>
                </select>

                <input id="mod_name" name="mod_name" type="text" class="form-control" placeholder="Model Number" required="required" class="form-control">
                            
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
                <thead> 
                <tr>
                    <th>#</th>
                    <th>Category</th>
                </tr>
                </thead> 

                <tbody class="table-striped">

                <?php foreach ($cat_name as $itemlist): ?>
                    <tr>
                    <td ><?=$itemlist['at_id']?></td>
                    <td><?=$itemlist['at_name']?></td>
                     
                </tr>
                <?php endforeach; ?>
                </tbody >
              </table>
        
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
        $("#item option:gt(0)").remove();
  	    $("#brand option:gt(0)").remove();
        // $("#result tbody").remove(); 
        // $("#result thead").remove();
        
        $('#ast_at_id').find("option:eq(0)").html("Please wait..");
      },                         
      success: function (data) {
        /*get response as json */
         $('#ast_at_id').find("option:eq(0)").html("Select Category");
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

  /*Get the item list */
  $('#ast_at_id').change(function(){
    $.ajax({
      type: "POST",
      // url: "<?php echo base_url();?>assets/get_brand",
      url: "<?php echo base_url();?>assets/get_item",
      data:{id:$(this).val()}, 
      beforeSend :function(){
        $("#item option:gt(0)").remove();
        $("#brand option:gt(0)").remove();
        $("#result tbody").remove(); 
        $("#result thead").remove();
        $("#mod_name").val("");
    
        $('#item').find("option:eq(0)").html("Please wait..");

      },                         
      success: function (data) {
        /*get response as json */
         $('#item').find("option:eq(0)").html("Select Item");
         $('#item').attr('value','0');

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

/*get the brand list*/
    $('#item').change(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>assets/get_brand",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $("#brand option:gt(0)").remove(); 
      $("#result tbody").remove(); 
      $("#result thead").remove();
      $("#mod_name").val("");
    
      $('#brand').find("option:eq(0)").html("Please wait..");

        },                         
        success: function (data) {
          /*get response as json */
           $('#brand').find("option:eq(0)").html("Select Brand");
           $('#brand').attr('value','0');
           
          var obj=jQuery.parseJSON(data);
          var th = '<thead><tr><th>#</th><th>Model</th></tr></thead>';
            $('#result').append(th);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.bnd_id).text(this.bnd_name);           
           $('#brand').append(option);

          var tr="<tr>";
          var td1="<td>"+ this.bnd_id +"</td>";
          var td2="<td>"+ this.bnd_name +"</td></tr>";
           $('#result').append(tr+td1+td2);

         });  

          /*ends */
        }
      });
    });


  /*Get */
    $('#brand').change(function(){
       //var ast_at_id=$('#ast_at_id').val();
      // var courses=$('.courses').val();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>assets/get_model",
        data:{id:$(this).val() }, //items:items, courses:courses ,, ast_at_id:ast_at_id
           beforeSend :function(){
            $("#mod_name").val("");
   
           $("#result tbody").remove(); 
           $("#result thead").remove();
      // $('.std_id').find("option:eq(0)").html("Please wait..");

        },  

        success: function (data) {
          /*get response as json */
            // $('.tnsinfo').find("option:eq(0)").html("Select Student ID");

          var obj=jQuery.parseJSON(data);
         
          var th = '<thead><tr><th>#</th><th>Model</th></tr></thead>';
            $('#result').append(th);

          $(obj).each(function()
          { 
              var tr="<tr>";
              var td1="<td>"+ this.mod_id +"</td>";
              var td2="<td>"+ this.mod_name +"</td></tr>";
               $('#result').append(tr+td1+td2);
         });  
          /*ends */
        }
      });
    });

  });

</script>
