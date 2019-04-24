<?php
  require("lib/db.php");
  require("config/config.php");
  $conn = db_init($config['dhost'],$config['duser'],$config['dpasswd'],$config['dname']);
  $result = mysqli_query($conn, "SELECT * FROM topic");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="assets/css/style.css?" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Write | webapp</title>
  </head>
  <body id="target">
    <div class="container">
    <header class="jumbotron text-center">
      <img src="http://localhost/assets/images/mark.jpg" class="rounded-circle" alt="" style="width:200px; height:200px">
      <h1><a href="http://localhost/">JavaScript</a></h1>
    </header>
    <div class="row">
    <nav class="col-md-3">
      <ol class="nav flex-column nav-pills">
          <?php 
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<a href=http://localhost/index.php?id=".$row['id']."><li>".htmlspecialchars($row['title'])."</li></a>";
            }
          ?>
      </ol>
    </nav>
    <div class="col-md-9">
    <div id="control" class="btn-group" >
      <input
        type="button"
        value="white"
        onclick="document.getElementById('target').className='white'" class="btn btn-primary btn-lg"
      />
      <input
        type="button"
        value="black"
        onclick="document.getElementById('target').className='black'" class="btn btn-primary btn-lg"
      />
      <a href="http://localhost/write.php" class="btn btn-success btn-lg">쓰기</a>
    </div>
  
    <article>
    <div class="form-group">
    <label for="form-title">제목</label>
    <input type="text" class="form-control" id="form-title" name="title" placeholder="제목">
    </div>

    <div class="form-group">
    <label for="form-author">작성자</label>
    <input type="text" class="form-control" id="form-author" name="author" placeholder="작성자">
    </div>

    <div class="form-group">
    <label for="form-description">본문</label>
    <textarea class="form-control" id="form-description" name="discription" placeholder="내용" rows="10"></textarea>
    </div>
    <form action="process.php" method="post">
          
          
      
          <input type="submit" value="완료" class="btn btn-dark">
      </form>
    </article>
    </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
