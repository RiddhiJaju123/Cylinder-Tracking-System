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

.your-class input{
  float:left;
}
.you input{
  float:right;
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
</div >
</div>
</body>
</html>
<h1><center><border><b>Balaji Trading Company</b></border></center></h1>
<b>Address-</b>

Old delhi naka,Sangamner,Maharashtra ,Pin code-422605
<br>
<b>Phone no- </b>(02425)223610 ,<b>Mobile no-</b> (+91) 9370025610</h4><br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "balajitradingcompany";
$total=0;
$total1=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['save'])) {
    $customername = $_POST['customername'];
	$date=$_POST['date'];
echo "Challan Number:";
$sql1=("SELECT Challan_number from dilevarychallan WHERE customerName='$customername' AND Date='$date'");
$result1=mysqli_query($conn, $sql1);


if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  while($row1 = mysqli_fetch_assoc($result1)) {
echo $row1['Challan_number'];
echo ",";
}
}
echo "<br>";
$sql= ("SELECT itemtype,Full_cylinder,Empty_cylinder from $customername WHERE Date='$date'")or die(mysql_error());
$query=("SELECT id from customer_details WHERE customerName='$customername'")or die(mysql_error());
echo "ID:";
$result =mysqli_query($conn, $query);
while ($row = $result->fetch_assoc()) {
echo $row['id']."<br>";
}
echo "Date:";
$timestamp=strtotime($date);
$new_date=date("d-m-y",$timestamp);
echo "<td>$new_date</td>";

echo "<br>";
echo "Customer Name : ";
echo $customername;

echo "<table border='1' rules='all'>";
echo "<tr>";


echo "<td>Item type</td>";
echo "<td>Full cylinder</td>";
echo "<td>Empty cylinder</td>";

echo "</tr>";

$result =mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
 echo "<tr>";


echo "<td>$row[itemtype]</td>";
echo "<td>$row[Full_cylinder]</td>";
echo "<td>$row[Empty_cylinder]</td>";

    echo "</tr>\n";
    
  }
} 
$sql="SELECT Full_cylinder from quantity WHERE Date='$date' AND customerName='$customername'";
$result =mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
$total=$total+ $row['Full_cylinder'];
}
}

$sql1="SELECT Empty_cylinder from quantity WHERE Date='$date' AND customerName='$customername'";
$result1 =mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result1)) {
$total1=$total1+ $row['Empty_cylinder'];

}
}
echo "<tr>";


echo "<td>Total:</td>";

echo "<td>$total</td>";
echo "<td>$total1</td>";
echo "</tr>\n";
echo "</table>";
}

$conn->close();	
?>


Please ensure the goods are in proper condition and kindly accept the one's mentioned in challan only.<br>
<b>Damrage Charges</b><br>
 1)Free for first 10 days  2)2 rupees will be charged per day per cylinder for next 10 days
  3)After 20 days,3 rupees will be charged per day per cylinder.<br> 4)For the next 10 days the charges will be 5 rupees per day per cylinder
  5)Rupees 10 will be charged till 60 days per cylinder. <br>  6)Cylinder should be returned in 130 days
  7)600 rupees will be charged if any damage in found in cylinder valve.<br>   8)If any damage is caused to cylinder, 10000 rupees will be charged for it per cylinder.
  9)If oil or gas is required in cylinder it will be charged 300 rupees.<br>
<center><b>--------------I have read the above points and agree with it-------------</b></center>
<div class="your-class">

  <label>Owner's Signature:</label>
  <input name="ownerssign" id="Ownerssign" type="text" class="one_fourth first" />
</div><br><br>

  <label>Customer's Signature:</label>
  <input name="sign" id="sign" type="text"/> 

<br><br>
<input type="button" class="noprint" value="Print this page" onClick="window.print()">
</form>