<?php
   require_once 'classes/item.php'; 
   $item = new TItem(); // Creating object with connection to DataBase

  if (!empty($_POST['code'])) { // if User added item
  	if ($_POST['_token'] == $_SESSION['token']) { // defence from CSFR
	    $_POST['date'] = date("Y-m-d H:i:s");

	    $item->SetData($_POST); // Add item to object 
	    $item->AddDataToDB();  // Add object's data to DataBase
	}

    header("Location: index.php"); 
  }
?>


<!DOCTYPE HTML>
<html>
<head>
    <title>ScandiWeb project</title>
    	<!--META TAGS -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
    <!--Bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>


	<!-- CSS -->
    <link rel="stylesheet" href="css/styles.css" type="text/css" charset="utf-8" />
    <!-- JavaScript -->
    <script src="js/functions.js" type="text/javascript"></script>

</head>
<body>
	<form role="form" method="post" action="add.php">
		<input type="hidden" name="_token" value="<?php echo $item->_token ?>" /> 
	    <nav class="navbar navbar-default m-x-auto">
	    	<div class="row">
	    		<div class="col-md-7 text-xs-left page-headline"> Product Add </div>
		    		<div class="col-md-5 text-xs-right">	
		    			  <a href="index.php"><div class="btn btn-info">Back</div></a>
			              <input type="submit" class="btn save-btn" value="Save" title="Type is not choosen" disabled="disabled">
			    </div>
	        </div>
	    </nav>   

	    <div class="conteiner  add-main">


	      <div class="conteiner-fluid text-xs-left"> 
	      	<label>SKU:</label>
	        <input class="form-control" type="text" name="code" required />
	      </div>
	      <div class="conteiner-fluid text-xs-left"> 
	      	<label>Name:</label>
	        <input class="form-control" type="text" name="name" required />
	      </div>
	      <div class="conteiner-fluid text-xs-left"> 
	      	<label>Price:</label>
	        <input class="form-control" type="text" name="price" required />
	      </div> 
	      <div class="conteiner-fluid text-xs-left"> 
	      	<label>Type Switcher:</label>
	       		<select class="selectpicker select-item-type" name ="type">
	       		  <option class="selected">Type Swither</option>
				  <option value="Virtual">DVD-dics</option>
				  <option value="Weighted">Book</option>
				   <option value="Volume">Furniture</option>
				</select>
	      </div>  


	       <div class="conteiner-fluid">
	       	  <div class="add-properties">
		       	  	<div class="add-size">
			            <label>Size:</label>
			            <input type="text" name="size" class=" form-control size-input"/> 
		           		<div class="hint">Please provide size in MB format</div>			           
			        </div>
			        <div class="add-weight">
	                  <label>Weight:</label>
	                  <input type="text" name="weight"  class=" form-control weight-input"/>
	                  <div class="hint">Please provide weight in KG format</div>		
			        </div>
			        <div class="add-dimension">
	     				<label>Height:</label>
	     				<input type="text" name="height"  class="form-control d-height-input" /><br/>
	     				<label>Width:</label>
	     				<input type="text" name="width" class=" form-control d-width-input"/><br/>
	     				<label>Lenght:</label>
	     				<input type="text" name="length" class=" form-control d-lenght-input" />
	     				<div class="hint">Please provide dimensions in HxWxL format</div>		
	     			</div>
	       	  </div>

	       </div>   
	    </div>
    </form>


</body>
</html>