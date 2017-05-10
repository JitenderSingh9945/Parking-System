<!DOCTYPE html>
<html>
<head>
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
 		<li class="active"><a href="park.php">Park</a></li>
 		<li><a href="unpark.php">UnPark</a></li>
 		<li><a href="display.php">Display</a></li>

 	</ul>
 </div>

</nav>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="form-group">
<div class="panel panel-primary">
<div class="panel-heading">Park The Vehicle</div>
<div class="panel-body">
<form action="park.php" method="post" class="form-inline">
	<label for="addit">Enter Registration No:</label>
	<input type="text" name="addit" id="addit" class="form-control" required><br><br>
	<input type="submit" value="Submit" class=" form-control btn btn-primary">
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_POST['addit']))
{
	$x=date('Y-m-d H:i:s');

	include 'conn.php';
	$y=$_POST['addit'];
	$sql="select slotno from box limit 1";
	#echo "Parked Vehicle $y";
	$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0){
   	$row=mysqli_fetch_assoc($result);

   	$s=$row['slotno'];
   	if ($s>0) {
   		$sql2="INSERT INTO pa VALUES($y,$s,NOW())";
   	mysqli_query($conn,$sql2);
   	$sql3="delete from box where slotno=".$s;
   	mysqli_query($conn,$sql3);
   	?>
<div class="container">
   <div class="row">
   <div class="col-md-6 col-md-offset-3 text-center">
   <div class="panel panel-primary">
   <div class="panel-heading">Parked</div>
   <div class="panel-body">
   <?php echo "<h4>Parked Vehicle ".$y." at: ".$s."</h4>";?>
   
   </div>
   </div>
   </div>
   </div>
   </div>
<?php }
else{
	?>
<div class="container">
   <div class="row">
   <div class="col-md-6 col-md-offset-3 text-center">
   <div class="panel panel-primary">
   <div class="panel-heading">Parked</div>
   <div class="panel-body">
   <h2>can ni!!</h2>
   
   </div>
   </div>
   </div>
   </div>
   </div>


	<?php
}
   	
}
 }




?>
</body>
</html>