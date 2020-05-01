<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'mydiary');


$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());


$query = "SELECT * from inventory_paper_type";
$query1 = "SELECT * from inventory_paper_color";

$response = @mysqli_query($dbc, $query);
$response1 = @mysqli_query($dbc, $query1);



echo '
<head><link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="main.css">
</head>
<div class="navbar">
    <div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="home_admin.php" name="top">Brand Name</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li><a href="home_admin.php"><i class="icon-home"></i> Home</a></li>
					<li class="divider-vertical"></li>
					<li class="active"><a href="users.php"><i class="icon-user"></i> Users</a></li>
					<li class="divider-vertical"></li>
					<li><a href="stocks.php"><i class="icon-envelope"></i> Stocks</a></li>
					<li class="divider-vertical"></li>
                  	<li><a href="#"><i class="icon-signal"></i> Stats</a></li>
					<li class="divider-vertical"></li>
					<li><a href="inventory.php"><i class="icon-lock"></i> Inventory</a></li>
					<li class="divider-vertical"></li>
				</ul>
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i> Admin <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-share"></i> Logout</a></li>
					</ul>
				</div>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</div>
	<!--/.navbar-inner -->
</div>
<!--/.navbar -->
';





if($response){

echo '<table align="left" cellspacing="5" cellpadding="8">
<tr><td align="left"><b>Paper Type</b></td>
<td align="left"><b>Available</b></td></tr>';

while($row = mysqli_fetch_array($response)){

echo '<tr><form action="inventory_modify_type.php" method="post">';
echo "<td align='left'>" . $row['paper_type'] . "</td>";
echo "<td align='left'><input type=integer name=available value='" . $row['available'] . "'></td>";
//echo "<input type=hidden name=id value='" . $row['id'] . "'>";
echo "<input type=hidden name=paper_type value='" . $row['paper_type'] . "'>";
echo "<td><input type=submit value=Modify></td>";
echo "<td><input type=submit formaction='delete_inventory_type.php' value=Delete></td>";
echo '</form></tr>';
}

echo "<tr><form action='add_inventory_type.php' method='post'>";
echo "<td align='left'><input type='text' name=paper_type_add placeholder='Add Paper Type'></td>";
echo "<td align='left'><input type=integer name=available_type placeholder='Add quantity'></td>";
echo "<td><input type=submit value='Add +'></td>";
echo '</form></tr>';
echo '</table>';
} 
else 
{
echo "Couldn't issue database query<br />";
echo mysqli_error($dbc);
}

if($response1){

    echo '<table align="right"
    cellspacing="5" cellpadding="8">
    <tr><td align="left"><b>Paper Color</b></td>
    <td align="left"><b>Available</b></td></tr>';
    
    while($row = mysqli_fetch_array($response1)){
    
echo '<tr><form action="inventory_modify_color.php" method="post">';
echo "<td align='left'> ". $row['paper_color'] . "</td>";
echo "<td align='left'><input type=integer name=available value='" . $row['available'] . "'></td>";
//echo "<input type=hidden name=id1 value='" . $row['id'] . "'>";
echo "<input type=hidden name=paper_color value='" . $row['paper_color'] . "'>";
echo "<td><input type=submit value=Modify></td>";
echo "<td><input type=submit formaction='delete_inventory_color.php' value=Delete></td>";
echo '</form></tr>';
    }
echo "<tr><form action='add_inventory_color.php' method='post'>";
echo "<td align='left'><input type=text name=paper_color_add placeholder='Add Paper Color'></td>";
echo "<td align='left'><input type=integer name=available_color placeholder='Add quantity'></td>";
echo "<td><input type=submit value='Add +'></td>";
echo '</form></tr>';
    echo '</table>';
    } 
    else 
    {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
    }

mysqli_close($dbc);

?>