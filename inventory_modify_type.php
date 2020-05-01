<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'mydiary');


$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

$query = "UPDATE inventory_paper_type SET paper_type='$_POST[paper_type]',available='$_POST[available]' WHERE paper_type='$_POST[paper_type]'";
echo $query;

$response = @mysqli_query($dbc, $query);

if($response)
{
    header("refresh:1; url=inventory.php");
}
else
{
    echo "Not Updates";
}
echo mysqli_error($dbc);


mysqli_close($dbc);

?>