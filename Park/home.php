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
 <div class="col-md-6 col-md-offset-3">
<div class="panel panel-danger">
<div class="panel-heading">
	Ignore If already entered the No of Slots..
</div>
</div>
</div>	
</div>

<div class="row">

<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary">
<div class="panel-heading">
	Enter No of Slots
</div>
<div class="panel-body text-center">
<div class="form-group">
<form action="home.php" method="post" class="form-inline">
	<label for="st">Enter No. of Slots: </label>
	<input type="text" name="slots" class="form-control" id="st" required><br><br><br>
	<div class="pull-right">
	<input type="submit" class="form-control btn btn-primary">
	</div>
</form>
</div>
</div>
</div>

</div>
</div>
<?php
if(isset($_POST['slots']))
{
include 'conn.php';
$x=$_POST['slots'];


for ($i=1;$i<=$x;$i++){
$sql="INSERT INTO box VALUES($i)";
$result=mysqli_query($conn,$sql);	
}
?>
<div class="row">
 <div class="col-md-6 col-md-offset-3">
<div class="panel panel-success">
<div class="panel-heading">
	<?php
echo $x." slots created successfully !!";
?>
</div>
</div>
</div>	
</div>

<?php

}
?>

<div class="row">
<div class="col-md-6 text-right">
<form action="park.php" method="post">
	
	<input type="submit" value="Park" class="btn btn-primary btn-lg" style="width:200px;">
</form>
</div>
<div class="col-md-6 text-left">
<form action="unpark.php" method="post">
	
	<input type="submit" value="UnPark" class=" btn btn-success btn-lg" style="width:200px;">
</form>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6 text-right">
<form action="display.php" method="post">
	
	<input type="submit" value="Display" class="btn btn-danger btn-lg" style="width:200px;">
</form>

</div>
<div class="col-md-6 text-left">
<form action="slot.php" method="post">
	
	<input type="submit" value="Slot" class="btn btn-info btn-lg" style="width:200px;">
</form>

</div>
</div>
</div>
</div>

</body>
</html>
