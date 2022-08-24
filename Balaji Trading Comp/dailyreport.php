<!DOCTYPE html>

<html lang="">

<head>
<title>Balaji Trading Company</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style>
@media print { 
               .noprint { 
                  visibility: hidden; 
               } 
            } 
</style>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="noprint">
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
</div>

<div name="div1" id="div1">
<b><center>Balaji Trading Company</center><b>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "balajitradingcompany";
$total=0;
$total1=0;
$ta=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['save'])) {
$Date = $_POST['Date'];
$CashCredit= $_POST['reporttype'];
echo "Date:";
$timestamp = strtotime($Date);
 
// Creating new date format from that timestamp
$new_date = date("d-m-Y", $timestamp);
echo $new_date; 

echo "<table border='1'>";	
echo "<tr>";

echo "<td>Customer Name</td>";
echo "<td>Item Type</td>";

echo "<td>Full_cylinder</td>";
echo "<td>Empty_cylinder</td>";
echo "<td>Amount</td>";
echo "</tr>\n";
if($CashCredit=='Cash'){
$sql= ("SELECT customerName,item_type,Full_cylinder,Empty_cylinder,Amount from cash WHERE Date='$Date'")or die(mysql_error());
$result =mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";

echo "<td>$row[customerName]</td>";
echo "<td>$row[item_type]</td>";

echo "<td>$row[Full_cylinder]</td>";
$total= $total+ $row['Full_cylinder'];
echo "<td>$row[Empty_cylinder]</td>";
$total1= $total1+ $row['Empty_cylinder'];
$ta=$ta+$row['Amount'];
echo "<td>$row[Amount]</td>";
echo "</tr>\n";}
}
}

else{
$sql= ("SELECT  customerName,item_type,Full_cylinder,Empty_cylinder,Amount from credit WHERE Date='$Date'")or die(mysql_error());
$result =mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";

echo "<td>$row[customerName]</td>";
echo "<td>$row[item_type]</td>";

echo "<td>$row[Full_cylinder]</td>";
$total= $total+ $row['Full_cylinder'];
echo "<td>$row[Empty_cylinder]</td>";
$total1= $total1+ $row['Empty_cylinder'];
echo "<td>$row[Amount]</td>";
$ta=$ta+$row['Amount'];
echo "</tr>\n";}
}
}
}
echo "<tr>";
echo "<td></td>";

echo "<td>Total:</td>";

echo "<td>$total</td>";
echo "<td>$total1</td>";


echo "<td>$ta</td>";

echo "</tr>\n";
echo "</table>";
mysqli_close($conn);

?>
</div>

<form >
<input type="button" class="noprint" value="Print this page" onClick="window.print()">
</form>
</body>
</html>