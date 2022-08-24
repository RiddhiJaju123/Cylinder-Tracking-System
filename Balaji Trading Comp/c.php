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
$count=0;
$count1=0;
$count2=0;
$count3=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['save'])) {
$cylinder_number = $_POST['cylindernumber'];
echo "Cylinder Number:";
echo $cylinder_number;
echo "<br>";
echo "<table border='1'>";	
echo "<tr>";
echo "<td>Customer Name</td>";
echo "<td>Full cylinder</td>";
echo "<td> Challan number Full cylinder</td>";
echo "<td>Empty cylinder</td>";

echo "<td> DC Empty cylinder</td>";
echo "</tr>\n";
$sql= ("SELECT customerName from customer_details")or die(mysql_error());
$result =mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
$query=("SELECT Date, customerName,Full_cylinder,Empty_cylinder from $row[customerName] WHERE Full_cylinder='$cylinder_number' OR Empty_cylinder='$cylinder_number'")or die(mysql_error());
$result1=mysqli_query($conn, $query);
if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  while($row1 = mysqli_fetch_assoc($result1)) {
if($row1['Full_cylinder'] != NULL){
echo "<tr>";
echo "<td>$row1[customerName]</td>";
$timestamp = strtotime($row1['Date']);
 
// Creating new date format from that timestamp
$new_date = date("d-m-Y", $timestamp);

echo "<td>$new_date</td>";
$sql6=" SELECT Challan_number from dilevarychallan WHERE Date='$row1[Date]' AND customerName='$row1[customerName]'";
$result6 =mysqli_query($conn, $sql6);
if (mysqli_num_rows($result6) > 0) {
  // output data of each row
  while($row6 = mysqli_fetch_assoc($result6)) {
echo "<td>$row6[Challan_number]</td>";
break;
}
}

$var=$row1['Date'];
$sql2="SELECT Date from $row[customerName]  WHERE Empty_cylinder=$row1[Full_cylinder]";
$result2=mysqli_query($conn, $sql2);
if (mysqli_num_rows($result2) > 0) {
  // output data of each row
  while($row2 = mysqli_fetch_assoc($result2)) {
if($row2['Date']>$var){

$timestamp1 = strtotime($row2['Date']);
 
// Creating new date format from that timestamp
$new_date1 = date("d-m-Y", $timestamp1);

echo "<td>$new_date1</td>";


$sql7=" SELECT Challan_number from dilevarychallan WHERE Date='$row2[Date]' AND customerName='$row1[customerName]'";
$result7 =mysqli_query($conn, $sql7);
if (mysqli_num_rows($result7) > 0) {
  // output data of each row
  while($row7 = mysqli_fetch_assoc($result7)) {
echo "<td>$row7[Challan_number]</td>";
echo "</tr>\n";
break;
}
}

break;
}
}

}}






}
}


}
}



echo "</table>";

}
mysqli_close($conn);

?>