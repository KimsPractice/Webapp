<?php
  $conn = mysqli_connect('localhost','root','123456');
  $db_select = mysqli_select_db($conn,"webapp");
  if ($conn && $db_select) {
    echo "접속성공";
  } else {
    echo "접속실패";
  }
  $result = mysqli_query($conn, "SELECT * FROM topic");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Home | webapp</title>
  </head>
  <body id="target">
    <header>
      <h1><a href="http://localhost/">JavaScript</a></h1>
    </header>
    <nav>
      <ol>
          <?php 
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<a href=http://localhost/index.php?id=".$row['id']."><li>".htmlspecialchars($row['title'])."</li></a>";
            }
          ?>
          
      </ol>
    </nav>
    <div id="control">
      <input
        type="button"
        value="white"
        onclick="document.getElementById('target').className='white'"
      />
      <input
        type="button"
        value="black"
        onclick="document.getElementById('target').className='black'"
      />
      <a href="http://localhost/write.php">쓰기</a>
    </div>
    <article>
      <?php 
        if (empty($_GET['id']) === false) {
          $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "<h2>".htmlspecialchars($row["title"])."</h2>";
        echo "<p>".htmlspecialchars($row['name'])."</p>";
        echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
        } else {
          echo "<h1>환영합니다</h1>";
        }
        
      ?>
    </article>
  </body>
</html>
