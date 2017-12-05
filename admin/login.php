<?php
  session_start();
  session_unset();
  session_destroy();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ANANG SPORT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
  .lgbox{
    position: absolute; width: 300px; height: 300px;
    top: 50%; left: 50%; margin-top: -150px; margin-left: -150px;
    border-radius: 20px; border: 1px solid #DDD; box-shadow: 0px 0px 10px #000;
    padding: 20px;
    background-color: #EEE;
  }
  body {
    background: #999;
  }
  </style>
</head>
<body>
  <div class="lgbox">
    <div style="text-align:center; padding: 5px; margin-top:40px;">
      <b>Login Admin</b>
    </div>
    <form action="alogin.php" method="post">
      <div class="form-group">
        <input type='text' class='form-control' name='lguser' placeholder="Username">
      </div>
      <div class="form-group">
        <input type='password' class='form-control' name='lgpass' placeholder="Password">
      </div>
      <div class="form-group">
        <input type='submit' class='form-control btn btn-primary' value="Login">
      </div>
    </form>
  </div>
</body>
</html>
