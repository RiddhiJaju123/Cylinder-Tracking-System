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
if (isset($_POST['save'])){
$id= $_POST['id'];
$customername= $_POST['customername'];
$on= $_POST['on'];
$gst=$_POST['gst'];
$pan= $_POST['pan'];
$mn= $_POST['mn'];
?>

<form method="post" action="changes1.php">
<input type="number" name="id" value="<?php echo $id; ?>" />
<input type="text" name="customername" value="<?php echo $customername; ?>" />

<input type="text" name="on" value="<?php echo $on; ?>" />
<input type="text" name="gst" value="<?php echo $gst; ?>" />
<input type="text" name="pan" value="<?php echo $pan; ?>" />
<input type="text" name="mn" value="<?php echo $mn; ?>" />

    <button type="submit" name="save" class="registerbtn">Save Changes</button>
  </div>

 
</form>
<?php
}
?>