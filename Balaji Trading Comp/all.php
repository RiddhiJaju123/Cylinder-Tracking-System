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


    
	
$sql= ("SELECT * from customer_details");
echo "<table border='1'>";
echo "<tr>";
echo "<td>id</td>";
echo "<td>Customer Name</td>";
echo "<td>Owner name</td>";
echo "<td>GST number</td>";
echo "<td>PAN number</td>";
echo "<td>Mobile number</td>";
$result =mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
 echo "<tr>";
echo "<td>$row[id]</td>";
echo "<td>$row[customerName]</td>";
echo "<td>$row[Owner_name]</td>";
echo "<td>$row[GST_number]</td>";
echo "<td>$row[PAN_number]</td>";
echo "<td>$row[MobileNumber]</td>";
?>
<form method="post" action="changes.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
<input type="hidden" name="customername" value="<?php echo $row['customerName']; ?>" />

<input type="hidden" name="on" value="<?php echo $row['Owner_name']; ?>" />
<input type="hidden" name="gst" value="<?php echo $row['GST_number']; ?>" />
<input type="hidden" name="pan" value="<?php echo $row['PAN_number']; ?>" />
<input type="hidden" name="mn" value="<?php echo $row['MobileNumber']; ?>" />
 <td><button type="submit" name="save" class="registerbtn">Edit</button></td>
 </form>
<?php      
echo "</tr>\n";
   
  }
} 
echo "</table>";


mysqli_close($conn);
?>