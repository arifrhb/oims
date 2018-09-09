<script type="text/javascript">
  
  $(document).ready(function(){

      $.ajax({
        type: "GET",
        url: "<?php echo base_url();?>assets/get_category",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $(".items option:gt(0)").remove(); 
      $(".std_id option:gt(0)").remove();
      $(".tnsinfo tr:gt(0)").remove(); 
      
      $('.categories').find("option:eq(0)").html("Please wait..");
        },                         
        success: function (data) {
          /*get response as json */
           $('.categories').find("option:eq(0)").html("Select Category");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.categories').append(option);
         });  

          /*ends */
          
        }
      });

    /*Get the item  list */

    $('.categories').change(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>assets/get_batch",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $(".items option:gt(0)").remove(); 
      $(".roll option:gt(0)").remove(); 
      $(".std_id option:gt(0)").remove();
      $(".tnsinfo tr:gt(0)").remove(); 
    
      $('.items').find("option:eq(0)").html("Please wait..");

        },                         
        success: function (data) {
          /*get response as json */
           $('.items').find("option:eq(0)").html("Select Batch");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.items').append(option);
         });  

          /*ends */
          
        }
      });
    });




    /*Get the roll list */


    $('.items').change(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>category/get_roll",
        data:{id:$(this).val()}, 
          beforeSend :function(){ 
      $(".roll option:gt(0)").remove(); 
    $(".std_id option:gt(0)").remove();
    $(".tnsinfo tr:gt(0)").remove(); 
      $('.roll').find("option:eq(0)").html("Please wait..");

        },  

        success: function (data) {
          /*get response as json */
            $('.roll').find("option:eq(0)").html("Select Roll");

          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);
           $('.roll').append(option);
         });  
          
          /*ends */
          
        }
      });
    });

  /*Get the student ID */
    $('.roll').change(function(){
      var items=$('.items').val();
      var courses=$('.courses').val();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>category/get_stdid",
        data:{roll:$(this).val(),items:items, courses:courses }, 
          beforeSend :function(){
   
      $(".std_id option:gt(0)").remove(); 
    $(".tnsinfo tr:gt(0)").remove(); 
      $('.std_id').find("option:eq(0)").html("Please wait..");

        },  

        success: function (data) {
          /*get response as json */
            $('.std_id').find("option:eq(0)").html("Select Student ID");

          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label + ' - ' +this.label2);
           $('.std_id').append(option);
         });  
          
          /*ends */
          
        }
      });
    });

  // /*Get transection information*/
    $('.std_id').change(function(){
      // var items=$('.items').val();
      // var courses=$('.courses').val();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>category/get_payment_status",
        data:{std_id:$(this).val()}, //items:items, courses:courses  
           beforeSend :function(){
   
       $(".tnsinfo tr:gt(0)").remove(); 
      // $('.std_id').find("option:eq(0)").html("Please wait..");

         },  

        success: function (data) {
          /*get response as json */
            // $('.tnsinfo').find("option:eq(0)").html("Select Student ID");

          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
          // var option = $('<option />');
       
          /// option.attr('value', this.value).text(this.label + ' - ' +this.label2);
       
      var tr="<tr>";
      var td1="<td>"+ this.tns_id +"</td>";
      var td2="<td>"+ this.tns_std +"</td>";
      var td3="<td>"+ this.tns_pay +"</td></tr>";
       
           $('.tnsinfo').append(tr+td1+td2+td3);
         });  
          
          /*ends */
          
        }
      });
    });
  });

</script>
