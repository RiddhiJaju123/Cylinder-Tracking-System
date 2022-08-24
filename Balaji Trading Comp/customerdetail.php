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

if (isset($_POST['save'])) {
$id = $_POST['id'];
$customername = $_POST['Name'];
$oName=$_POST['oName'];
$GST=$_POST['GST'];
$PAN=$_POST['PAN'];
    $Number = $_POST['Number'];
if($id!= 'NULL'){
$sql1="SELECT id from customer_details 	WHERE id='$id'";
$check=mysqli_query($conn,$sql1);
$checkrows=mysqli_num_rows($check);
if($checkrows>0){
echo "id Already exists";
}
else{
echo "customer Added";
}
}

$query= "CREATE TABLE $customername (Date DATE,customerName VARCHAR(50),itemtype VARCHAR(50),Full_cylinder TEXT(50), Empty_cylinder TEXT(50),vehicle_number TEXT(20))";

mysqli_query($conn,$query);
$sql= "INSERT INTO customer_details (id, customerName,Owner_name,GST_number,PAN_number, MobileNumber) VALUES ('$id' , '$customername' , '$oName','$GST','$PAN','$Number')"or die(mysql_error());

mysqli_query($conn,$sql);


}
$conn->close();
?>