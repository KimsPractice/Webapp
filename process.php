<?php  
  $conn = mysqli_connect('localhost','root','123456');
  $db_select = mysqli_select_db($conn,"webapp");

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $author = mysqli_real_escape_string($conn, $_POST['author']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);

  $sql = "SELECT * FROM user WHERE name='".$author."'";
  $result  = mysqli_query($conn, $sql);
  if($result->num_rows == 0){
    $sql = "INSERT INTO user (name, password) VALUES('".$author."', '111111')";
    mysqli_query($conn, $sql);
    $user_id = mysqli_insert_id($conn);
  } else {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
  }
  $sql = "INSERT INTO topic (title,description,author,created) VALUES('".$title."', '".$description."', '".$user_id."', now())";
  $result = mysqli_query($conn, $sql);
  header("Location: http://localhost/index.php");
?>