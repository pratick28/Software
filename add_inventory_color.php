<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'mydiary');


$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

$query = "INSERT INTO inventory_paper_color VALUES ('$_POST[paper_color_add]','$_POST[available_color]')";
echo $query;

$response = @mysqli_query($dbc, $query);

if($response)
{
    header("refresh:1; url=inventory.php");
}
else
{
    echo 'alert("Cannot be updated")';
  
}
//echo mysqli_error($dbc);


mysqli_close($dbc);

?>