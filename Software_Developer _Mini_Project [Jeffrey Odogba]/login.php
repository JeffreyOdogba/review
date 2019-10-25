<?php
//include('./actions/loginService.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">

<form action="actions/loginService.php" method="Post">
  <div class="form-group">
    <label for="username">Email</label>
    <input type="email" class="form-control" id="email" name = "email" placeholder="Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
  </div>
  <button type="submit" name="signin" class="btn btn-primary">Sign in</button>
</form>

</div>
</body>
</html>