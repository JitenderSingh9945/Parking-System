<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.css" >
        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="./js/bootstrap.min.js"></script>
</head>
<body>
<?php
include 'nav-bar.php';
?>

<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3 text-center">
<div class="panel panel-primary">
<div class="panel-heading">
	Know Where You Parked!!
</div>
<div class="form-group">
<div class="panel-body">
<form action="slot.php" method="post" class="form-inline">
	<label for="unpa">Enter Reg No:</label><input type="text" name="remove" id="unpa" class="form-control" required>
	<br><br>
	<input type="submit" value="Submit" class="form-control btn btn-primary">

</form>
</div>
</div>
</div>	
</div>
</div>
</div>
<?php
 if(isset($_POST['remove']))
 {
 	$x=$_POST['remove'];
 	include 'conn.php';
    $sql="select slotno from pa where regno=".$x;
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
       $row=mysqli_fetch_assoc($result);

       $s=$row['slotno'];
       ?>

       <div class="container">
       	<div class="row">
       	<div class="col-md-6 col-md-offset-3 text-center">
       		<div class="panel panel-primary">
       			<div class="panel-heading">
       				You Parked Your Vehicle at Slot No.:<?php echo "$s";?>
       			</div>
       		</div>
       	</div>
       	</div>
       </div>


       <?php
}

 }
?>

</body>
</html>