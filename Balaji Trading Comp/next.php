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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "balajitradingcompany";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<form action="companyreport.php" method="POST">
<?php
$date= $_POST['date'];

$itemtype= $_POST['itemtype'];
$count= $_POST['count'];
$countr= $_POST['countr'];
$id= $_POST['id'];
$Vehicle=$_POST['Vehicle'];
if($_POST['customername']==NULL){
$sql="SELECT customerName from customer_details WHERE id='$id'";
$result =mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
$customername= $row['customerName'];
}
}
}
else{
$customername= $_POST['customername'];
}

if (isset($_POST['save'])) {
 for ($i = 0; $i < $count; $i++) {$cylinderreturn='';
$cylindergiven= $_POST['cylindergiven'][$i];
if($Vehicle=='Own')
{
$Vnumber=$_POST['Vnumber'];
$sql = ("INSERT INTO $customername (Date, customerName,itemtype,Full_cylinder,Empty_cylinder,vehicle_number) VALUES ('$date', '$customername', '$itemtype','$cylindergiven','$cylinderreturn','$Vnumber')") or die(mysql_error());
mysqli_query($conn, $sql);
}
else{
$sql = ("INSERT INTO $customername (Date, customerName,itemtype,Full_cylinder,Empty_cylinder) VALUES ('$date', '$customername', '$itemtype','$cylindergiven','$cylinderreturn')") or die(mysql_error());
mysqli_query($conn, $sql);
}

}

for ($i = 0; $i < $countr; $i++){$cylindergiven='';
$cylinderreturn= $_POST['cylinderreturn'][$i];
if($Vehicle=='Own')
{
$Vnumber=$_POST['Vnumber'];
$sql = ("INSERT INTO $customername (Date, customerName,itemtype,Full_cylinder,Empty_cylinder,vehicle_number) VALUES ('$date', '$customername', '$itemtype','$cylindergiven','$cylinderreturn','$Vnumber')") or die(mysql_error());
mysqli_query($conn, $sql);
}
else{
$sql = ("INSERT INTO $customername (Date, customerName,itemtype,Full_cylinder,Empty_cylinder) VALUES ('$date', '$customername', '$itemtype','$cylindergiven','$cylinderreturn')") or die(mysql_error());
mysqli_query($conn, $sql);
}
}
}

?>
<input type="hidden" name="customername" value="<?php echo $_POST['customername']; ?>" />
<input type="hidden" name="itemtype" value="<?php echo $itemtype; ?>" />
<input type="hidden" name="countr" value="<?php echo $countr; ?>" />
<input type="hidden" name="date" value="<?php echo $date; ?>" />
<input type="hidden" name="count" value="<?php echo $count; ?>" />
<br><br><input type="submit" name="save" id="save"  value = "Dilevary Challan" /> 
</form>

</form>
<form action=msg.php method="POST">
<input type="hidden" name="itemtype" value="<?php echo $itemtype; ?>" />
<input type="hidden" name="countr" value="<?php echo $countr; ?>" />
<input type="hidden" name="date" value="<?php echo $date; ?>" />
<input type="hidden" name="count" value="<?php echo $count; ?>" />
<?php
$sql100="SELECT MobileNumber from customer_details WHERE id='$id'";
$result100 =mysqli_query($conn, $sql100);
if (mysqli_num_rows($result100) > 0) {
 while($row100 = mysqli_fetch_assoc($result100)) {
$mn= $row100['MobileNumber'];

}
}
$conn->close();
?>
<input type="hidden" name="mn" value="<?php echo $mn; ?>" />
<br><br><input type="submit" name="save" id="save"  value = "Send message" /> 

<form>