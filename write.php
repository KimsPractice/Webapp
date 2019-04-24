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
    <title>Write | webapp</title>
  </head>
  <body id="target">
    <header>
      <h1><a href="http://localhost/">JavaScript</a></h1>
    </header>
    <nav>
      <ol>
          <?php 
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<a href=http://localhost/index.php?id=".$row['id']."><li>".$row['title']."</li></a>";
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
      <form action="process.php" method="post">
          <input type="text" placeholder="제목" name="title">
          <input type="text" placeholder="작성자" name="author">
          <textarea cols="30" rows="10" placeholder="내용" name="description"></textarea>
          <input type="submit" value="완료">
      </form>
    </article>
  </body>
</html>
