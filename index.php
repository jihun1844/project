
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./index.css">
  <title>Document</title>
</head>
<div class="logo">
  <strong>겨울방학 게시판</strong>
</div>
<body style="overflow: hidden;">
  
  <div id="main">
    <input type="checkbox" id="menuicon">
    <label for="menuicon">
      <span></span>
      <span></span>
      <span></span>
    </label>
    
    <div class="menu-bar">
      <ul class="menu">
        <a class="text" href="./index.php">Home</a>
        <a class="text" href="./board.php">Board</a>
        <a class="text" href="./join.php">SignUp</a>
        <?php
        session_start();
        if(isset($_SESSION['md_id'])){ ?>
          <a class="text" href="./logout.php">logout</a>
        
        <?php }
            else{ ?>
              <a class="text" href="./login.php">login</a>
            <?php } ?>
      </ul>
    </div>
    
  </div>
  
  
</body>
</html>


