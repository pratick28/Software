<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'mydiary');

$username=$_POST['username'];
$pass=$_POST['password'];

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' . mysqli_connect_error());

// $query = "SELECT password FROM admin_details WHERE username='$username' AND password='admin'";
// $response = @mysqli_query($dbc, $query);
// $response=fetch_object()->password;

if($pass=='admin')
{
header("refresh:1; url=home_admin.php");
$ho='main'; 
echo '<form id="main" action="home_admin.php" method="POST"> 
      <input type="hidden" name="username" value = "' . $username . '"> 
      <input type="hidden" name="password" value = "' . $pass . '"> 
      </form> 
      <script type="text/javascript"> 
      document.getElementById(\'' .$ho .'\').submit(); 
    </script>'; 
}
else
{
    echo 'Not Found';
}

?>