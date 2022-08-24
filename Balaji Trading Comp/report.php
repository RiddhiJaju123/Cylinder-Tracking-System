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
    $customername = $_POST['Name'];
echo "Customer Name:";
echo $customername;	
$sql= ("SELECT Date,customerName,itemtype,Full_cylinder,Empty_cylinder from $customername")or die(mysql_error());
echo "<table border='1'>";
echo "<tr>";
echo "<td>Challan number</td>";
echo "<td>Date</td>";

echo "<td>Item type</td>";
echo "<td>Full_cylinder</td>";
echo "<td>Empty cylinder</td>";
echo "<td>Challan Number return</td>";
$result =mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {


if($row['Full_cylinder']!=NULL){
    echo "<tr>";
$sql5=" SELECT Challan_number from dilevarychallan WHERE Date='$row[Date]' AND customerName='$customername'";
$result5 =mysqli_query($conn, $sql5);
if (mysqli_num_rows($result5) > 0) {
  // output data of each row
  while($row5 = mysqli_fetch_assoc($result5)) {
echo "<td>$row5[Challan_number]</td>";
}
}
$timestamp=strtotime($row['Date']);
$new_date=date("d-m-y",$timestamp);
echo "<td>$new_date</td>";

$var=$row['Date'];








echo "<td>$row[itemtype]</td>";
echo "<td>$row[Full_cylinder]</td>";
if ($row['Empty_cylinder'] == NULL){
$sql1= "SELECT Full_cylinder,Date from $customername WHERE Empty_cylinder='$row[Full_cylinder]'";
$result1 =mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  while($row1 = mysqli_fetch_assoc($result1)) {
if($row1['Date']>$row['Date']){
$var2=$row1['Date'];
$timestamp1=strtotime($row1['Date']);
$new_date1=date("d-m-y",$timestamp1);
echo "<td>$new_date1</td>";
$sql6="SELECT Challan_number from dilevarychallan WHERE Date='$var2' AND customerName='$customername'";
$result6 =mysqli_query($conn, $sql6);
if (mysqli_num_rows($result6) > 0) {

  // output data of each row
  while($row6 = mysqli_fetch_assoc($result6)) {

echo "<td>$row6[Challan_number]</td>";
break;
}
}
break;
}

}

}


echo "</tr>";
}
}



    echo "</tr>\n";
  }
} 
echo "</table>";
}
$conn->close();	

?>