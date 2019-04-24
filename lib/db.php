<?php
function db_init($dhost,$duser,$dpasswd,$dname){
$conn = mysqli_connect($dhost,$duser,$dpasswd);
$db_select = mysqli_select_db($conn,$dname);

return $conn;
}
?>