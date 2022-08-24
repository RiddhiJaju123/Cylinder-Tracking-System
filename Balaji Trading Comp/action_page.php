<!DOCTYPE html>

<html lang="">

<head>
<title>Balaji Trading Company</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left"> 
      <!-- ################################################################################################ -->
      <h1 class="logoname"><a href="index.html">Balaji<span>T</span>rading<span>C</span>ompany</a></h1>
      <!-- ################################################################################################ -->
    </div>
    <nav id="mainav" class="fl_right"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
<li><a href="Balaji trading company.html">Delivery Challan</a></li>
<li><a href="dr.html">Daily Report</a></li>
<li><a class="drop" href="#">Customer Record</a>

<ul>
 <li><a href="all.php"> All Customer Personal Detail</a></li>       
<li><a href="specificcustomerdetail.html"> specific Customer Personal Detail</a></li>
        <li><a href="customerdetail.html">  Add Customer</a></li>
        
	<li><a href="report.html">Customer cylinder Record</a></li>

</ul></li>
<li><a href="cylinderrecord.html">Cylinder History</a></li>
</ul>

      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </header>
</div>
</body>
</html>

<?php
$purchased= $_POST['purchased'];
$returned= $_POST['returned'];
$date= $_POST['date'];
$amt=$_POST['amt'];
$customername= $_POST['Name'];
$itemtype= $_POST['itemtype'];
$Vehicle= $_POST['Vehicle'];
$mode=$_POST['mode'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "balajitradingcompany";
$id=$_POST['id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<form action="next.php" method="POST">
<br><p>Cylinder Purchased</p>
<?php
 $i = 0;
$pset=$purchased;
while($i!=$pset){
?>

<tr>
<td><input type="text" name="cylindergiven[<?php $i?>]"></td>

</tr>

<?php $i++;}?>
<input type="hidden" name="count" value="<?php echo $i; ?>" />

<br><p>Cylinder Returned</p>
<?php
 $j = 0;
$pset1=$returned;
while($j!=$pset1){
?>
<tr>
<td><input type="text" name="cylinderreturn[<?php $j?>]"></td>

</tr>


<?php $j++;}?>

<?php
if($_POST['Name']==NULL){
$sql="SELECT customerName from customer_details WHERE id='$id'";
$result =mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
$customername= $row['customerName'];
}
}

}
?>
<?php
if($Vehicle=='Own'){
?>
<b>Vehicle number:</b>
<input type="text" name="Vnumber" required>
<?php
}
?>


<?php
if($mode=='Cash'){



$query1="INSERT INTO cash(Date, customerName, item_type, Full_cylinder, Empty_cylinder,Amount) VALUES ('$date' , '$customername', '$itemtype', '$pset', '$pset1','$amt')";
$result1= mysqli_query($conn, $query1);


}




else
{

$query2="INSERT INTO credit(Date, customerName, item_type, Full_cylinder, Empty_cylinder, Amount) VALUES ('$date' , '$customername', '$itemtype', '$pset', '$pset1','$amt')";
$result2=mysqli_query($conn, $query2);


}

?>


<?php

$sql1="INSERT INTO quantity(Date,customerName,Full_cylinder,Empty_cylinder) VALUES ('$date','$customername','$purchased','$returned')";
$result1=mysqli_query($conn, $sql1);
if(empty($result1)){
$query1="CREATE TABLE quantity(Date DATE, customerName VARCHAR(50),Full_cylinder INT(50),Empty_cylinder INT(50))";
mysqli_query($conn, $query1);
}
?>
<?php


$sql2="INSERT INTO dilevarychallan(Date,customerName,Itemtype,Full_cylinder,Empty_cylinder) VALUES ('$date' , '$customername', '$itemtype', '$pset', '$pset1')";
$result2=mysqli_query($conn, $sql2);
if(empty($result2)){
$query1="CREATE TABLE dilevarychallan( Challan_number INT AUTO_INCREMENT,Date DATE, customerName VARCHAR(50),Itemtype VARCHAR(50),Full_cylinder INT(50),Empty_cylinder INT(50))";
mysqli_query($conn, $query1);
}


?>




<input type="hidden" name="countr" value="<?php echo $j; ?>" />
<input type="hidden" name="customername" value="<?php echo $customername; ?>" />

<input type="hidden" name="itemtype" value="<?php echo $itemtype; ?>" />
<input type="hidden" name="date" value="<?php echo $date; ?>" />
<input type="hidden" name="Vehicle" value="<?php echo $Vehicle; ?>" />
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<br><br><input type="submit" name="save" id="save" class="btn btn-primary btn-lg"/> </form>

</form>
<?php
 $j = 0;
$pset1=$returned;
while($j!=$pset1){
$sql99="SELECT Full_cylinder from $customername WHERE Full_cylinder='cylinderreturn[$j]' AND Date<'$date'";
$result99 =mysqli_query($conn, $sql99);
if (mysqli_num_rows($result99) > 0) {
 while($row99 = mysqli_fetch_assoc($result99)) {
 
}}
if( '! $row99'){
echo "Recheck the number entered";}$j++;}
?>
<?php
$conn->close();
?>
