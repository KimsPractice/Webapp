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
            echo file_get_contents("list.txt");
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
    </div>
    <article>
      <?php 
        echo file_get_contents($_GET['id'].".txt");
      ?>
    </article>
  </body>
</html>
