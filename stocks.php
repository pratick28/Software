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
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script></head>
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
						<i class="icon-user"></i> admin	<span class="caret"></span>
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
echo '<div class="container">';
echo '<table align="left" cellspacing="5" cellpadding="8" border="black">
<tr><td align="left"><b>Paper Type</b></td>
<td align="left"><b>Available</b></td></tr>';

while($row = mysqli_fetch_array($response))
{
echo "<tr>";
echo "<td align='left'> " . $row['paper_type'] . "</td>";
echo "<td align='left'> " . $row['available'] . " </td>";
echo '</tr>';
}
echo '</table>';
} 
else 
{
echo "Couldn't issue database query<br />";
echo mysqli_error($dbc);
}

if($response1){

    echo '<table align="right" cellspacing="5" cellpadding="8" border="black" >
    <tr><td align="left"><b>Paper Color</b></td>
    <td align="left"><b>Available</b></td></tr>';
    
while($row = mysqli_fetch_array($response1)){
    
echo '<tr>';
echo "<td align='left'> " . $row['paper_color'] . "</td>";
echo "<td align='left'> " . $row['available'] . " </td>";
echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    } 
    else 
    {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
    }

mysqli_close($dbc);

?>