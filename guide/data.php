<?php
include('../assests/dbconnect.php');
include('../auth/login/login.php');
if(!isset($_SESSION["g_id"])){
    header('Location: ../auth/login/notAuthorized/error.html');
  }
header('Content-Type: application/json');
$gid = $_SESSION["g_id"];
// $sqlQuery = "SELECT count(*) as 'Active' FROM projects where g_id=$gid and finalStatus = 0 ,(SELECT count(*) as 'Completed' FROM projects where g_id=$gid and finalStatus =1)";
$sqlQuery = "select sum(case when finalStatus = 0 then 1 else 0 end) As Active,sum(case when finalStatus = 1 then 1 else 0 end) As Completed from projects WHERE g_id=$gid";
$result = mysqli_query($link,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
echo json_encode($data);
?>