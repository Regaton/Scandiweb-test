
	$(document).ready( function() {


   		$(".selected").attr('selected','selected');


		 $(".select-action").change(function() { // Change action in SELECT (index.php) 


		 	$(".btn-aply").removeAttr('disabled');
		 	$(".btn-aply").removeAttr('title');
		 	$(".btn-aply").removeClass('btn-danger');
		 	$(".btn-aply").removeClass('btn-success');

		 	switch ($(this).val()) {
		 		case "Delete":
		 			$(".btn-aply").addClass('btn-danger');
		 		break;
		 		case "Insert":
		 			$(".btn-aply").addClass("btn-success");
		 		break;
		 		default:
		 			$(".btn-aply").attr('disabled','disabled');
		 			$(".btn-aply").attr('title','Action is not choosen');
		 		break;
			 }
		  });





	      $(".select-item-type").change(function() { // Change item type in SELECT (add.php)

	      	// Clear inputs
	      	$(".d-width-input").val('');
	      	$(".d-lenght-input").val('');
	      	$(".d-height-input").val('');
	      	$(".weight-input").val('');
	      	$(".size-input").val('');


	      	// Deleting attribute required
	        $(".d-width-input").removeAttr('required');
	        $(".d-height-input").removeAttr('required');
	        $(".d-lenght-input").removeAttr('required');
			$(".size-input").removeAttr('required');
			$(".weight-input").removeAttr('required');

			// Save button
			$(".save-btn").removeAttr('disabled');
	      	$(".save-btn").removeAttr('title');
	      	$(".save-btn").removeClass('btn-success');

	      	// Hide blocks
	        $(".add-size").hide();
	       $(".add-weight").hide();
	       $(".add-dimension").hide();


	       
	       switch ($(this).val()) {
	         case "Virtual": // Turn on button, set input - required, show block with type inputs
	         	$(".add-size").show();
	         	$(".size-input").attr('required','required');
	         	$(".save-btn").addClass('btn-success');
	         break;
	         case "Weighted": // Turn on button, set input - required, show block with type inputs
	         	$(".add-weight").show();
	         	$(".weight-input").attr('required','required');
	         	$(".save-btn").addClass('btn-success');
	         break;
	         case "Volume": // Turn on button, set input - required, show block with type inputs
	         	$(".add-dimension").show();
	         	$(".d-width-input").attr('required','required');
	         	$(".d-weight-input").attr('required','required');
	         	$(".d-lenght-input").attr('required','required');
	         	$(".save-btn").addClass('btn-success');

	         break;
	         default: // if User pressed "Switch type"
	            $(".save-btn").attr('disabled','disabled');
	            $(".save-btn").attr('title','Type is not choosen');
	         break;

	       }


	      });



	});