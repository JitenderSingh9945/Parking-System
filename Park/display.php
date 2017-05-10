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
    <li><a href="park.php">Park</a></li>
    <li><a href="unpark.php">UnPark</a></li>
    <li class="active"><a href="display.php">Display</a></li>

  </ul>
 </div>

</nav>
<?php
include 'conn.php';
$sql="select * from box";
$sql1="select regno,slotno from pa";
$result=mysqli_query($conn,$sql);
$result1=mysqli_query($conn,$sql1);
?>
<div class="container">
<div class="row">

<?php if(mysqli_num_rows($result)>0){ ?>

<?php
   while($row=$result->fetch_assoc()){?>
     <div class="col-md-2 text-center">
     <div class="panel panel-success">
     <div class="panel-heading">Available</div>
     <div class="panel panel-body">
       <?php echo "<h1>".$row['slotno']."</h1>"; ?>
       </div>
      <div class="panel-footer">
      	<?php echo "<p>Reg.No: Not Allotted</p>"; ?>
      </div>  
       </div>
       </div>
   <?php  
   } ?>
   
   
<?php
}
else{?>

<div class="col-md-2 text-center">
     <div class="panel panel-success">
     <div class="panel-heading">No Slots Entered</div>
     <div class="panel panel-body">
       <?php echo "<h1>0</h1>"; ?>
       </div>
        
       </div>
       </div>
   	
   

   <?php }




?>

<?php if(mysqli_num_rows($result1)>0){ ?>

<?php
   while($row=$result1->fetch_assoc()){?>
     <div class="col-md-2 text-center">
     <div class="panel panel-danger">
     <div class="panel-heading">Not Available</div>
     <div class="panel panel-body">
       <?php echo "<h1>".$row['slotno']."</h1>"; ?>
       </div>
      <div class="panel-footer">
      	<?php echo "<p>Reg.No: ".$row['regno']."</p>"; ?>
      </div> 
       </div>
       </div>
   <?php  
   } ?>
   
   
<?php
}
?>
</div>
</div>
</body>
</html>
