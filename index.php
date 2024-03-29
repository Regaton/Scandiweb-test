<?php 
  require_once 'init.php'; 

 $data[0] = $Weighted->Printing(); // Select Weighted type items
 $data[1] = $Virtual->Printing(); // Select Virtual type items
 $data[2] = $Volume->Printing(); // Select Volume type items
 $count = sizeof($data) - 1; 
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
	<form role="form" method="post" action="change.php">
    <nav class="navbar navbar-default m-x-auto">
    	<div class="row">
    		<div class="col-md-7 text-xs-left page-headline"> Product List </div>
	    		<div class="col-md-5 text-xs-right">
					<select class="selectpicker select-action" name="action">
						<option class="selected">Actions</option>
						<option value="Delete">Delete</option>
						 <option value="Insert">Insert</option> 
					</select>
		            <input type="submit" class="btn btn-aply " value="Aply" title="Action is not choosen" disabled="disabled">
		            
		    </div>
        </div>
    </nav>
    <div class="container-fluid justify-content-center">
     <?php
       $cont = 0;
       for ($i=0; $i<=$count; $i++):
       		if (!empty($data[$i])) $cont = 1;
            foreach ($data[$i] as $eachitem):  ?>

	        <div class="col-md-3">
		        <div class = "item container">
		          <div class="container-fluid checkbox item-checkbox m-l-auto"><input type="checkbox" name="<?php echo $eachitem['checkbox']?>" value="<?php echo $eachitem['id'] ?>" /></div>
		          <div class="container-fluid item-code text-xs-center"><?php echo $eachitem['code']?></div> 
		          <div class="container-fluid item-name text-xs-center"><?php echo $eachitem['name']?></div>
		          <div class="container-fluid item-price text-xs-center"><?php echo $eachitem['price']." \$"?> </div>
		          <div class="container-fluid item-property text-xs-center"><?php echo $eachitem['params'] ?></div>
	       		</div>
	       	</div>
<?php 	  endforeach; 
       	  
        endfor;
       if (!$cont):
       	 echo '<span class="no-item col-md-12 text-xs-center">You do not have items</span>';
         echo '<span class="no-item-2 col-md-12 text-xs-center">Please add new item</span>';
        endif;
        
?>


    </div>
   </form>
</body>
</html>

