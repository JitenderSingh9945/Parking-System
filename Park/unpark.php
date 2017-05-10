<!DOCTYPE html>
<html>
<head>
	<title>Unpark</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.css" >
        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="./js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
 <div class="container-fluid">
 	<div class="navbar-header">
 		<a href="#" class="navbar-brand active">ParkingLot</a>
 	</div>
 	<ul class="nav navbar-nav">
 		<li ><a href="home.php">Home</a></li>
 		<li><a href="park.php">Park</a></li>
 		<li class="active"><a href="unpark.php">UnPark</a></li>
 		<li><a href="display.php">Display</a></li>

 	</ul>
 </div>

</nav>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary">
<div class="panel-heading">
	Unpark The Vehicle
</div>
<div class="form-group">
<div class="panel-body">
<form action="unpark.php" method="post" class="form-inline">
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

if(isset($_POST['remove'])){
	date_default_timezone_set("Asia/Kolkata");
    $x=date('Y-m-d H:i:s');
    include 'conn.php';
	$sql="select regno,slotno,date from pa where regno=".$_POST['remove'];
	$result=mysqli_query($conn,$sql);
	$minutes=0;
	if(mysqli_num_rows($result)>0){
   	$row=mysqli_fetch_assoc($result);

   	$s=$row['slotno'];
   //$time=$x-$row['date'];

    $start_date=new DateTime($row['date']);
    $since_start=$start_date->diff(new DateTime($x));
    $minutes+=$since_start->days*24*60;
    $minutes+=$since_start->h*60;
    $minutes+=$since_start->i;
   //echo "$s";
   ?>
   <div class="container">
   <div class="row">
   <div class="col-md-6 col-md-offset-3 text-center">
   <div class="panel panel-primary">
   <div class="panel-heading">Pay</div>
   <div class="panel-body">
   <?php echo "<h2>".$minutes." Rupees</h2>";?>
   </div>
   </div>
   </div>
   </div>
   </div>
	<?php
	}
	$val=$row['slotno'];
	$sql1="insert into box values($val)";
	$result=mysqli_query($conn,$sql1);
	$sql2="delete from pa where regno=".$_POST['remove'];
	mysqli_query($conn,$sql2);


}
?>


</body>
</html>