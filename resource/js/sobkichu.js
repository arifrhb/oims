/* #####################################################################
   #
   #   Project       : Sobkichu Global Project
   #   Author        : Arif Uddin
   #   Version       : 1.0.1
   #   Created       : 30/10/2015
   #   Last Change   : 30/10/2015
   #
   ##################################################################### */

	/*
	#message = input field
	#totalChar = output field
	this function count the total character
	*/


/*
* to select the next selectable filed like input, select, textarea
*/
$('body').on('keydown', 'input, select, textarea', function(e) {
var self = $(this)
  , form = self.parents('form:eq(0)')
  , focusable
  , next
  , prev
  ;

if (e.shiftKey) {
 if (e.keyCode == 13) {
     focusable =   form.find('input,a,select,button,textarea').filter(':visible');
     prev = focusable.eq(focusable.index(this)-1); 

     if (prev.length) {
        prev.focus();
     } else {
        form.submit();
    }
  }
}
  else
if (e.keyCode == 13) {
    focusable = form.find('input,a,select,button,textarea').filter(':visible');
    next = focusable.eq(focusable.index(this)+1);
    if (next.length) {
        next.focus();
    } else {
        form.submit();
    }
    return false;
}
});


// Count charecter function.
function countChar(val) {
	$('#message').keyup(
		function () {
			var max = 160;
			var len = $(this).val().length;
			if (len >= max) {
				$('#totalChar').text(' you have reached the limit');
			} else {
				var char = max - len;
				$('#totalChar').text(char + ' characters left');
			}
		});
	};


// number checking function for fixed id
// $(document).ready(function () {
// 	  //called when key is pressed in textbox
// 	  $('#pro_price2').keypress(function (e) {
// 	     //if the letter is not digit then display error and don't type anything
// 	     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
// 	        //display error message
// 	        $('#errmsg').html('Numbers Only').show().fadeOut(2000);
// 	      //  $("#errmsg").html("Numbers Only").show().fadeOut("slow");
// 	               return false;
// 	    }
// 	   });
// 	});

//dynamically number checking function... 
function number(id) {
   
//    $(document).ready(function () {
	  //called when key is pressed in textbox
	  $('#' + id).keypress(function (e) {
	     //if the letter is not digit then display error and don't type anything
	     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	        //display error message
	        $('#err_' + id).html('Numbers Only').show().fadeOut('slow');
	        $('#err_msg').html('Numbers Only').show().fadeOut('slow');
	        return false;
	    }
	   });
//	});
};


//convert to uppercase automatically
function upper(id) {
//    $(document).ready(function () {
	  //called when key is pressed in textbox
	  $('#' + id).keyup(function (e) {
	    
	  		this.value = this.value.toUpperCase();

	   });
//	});
};


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});