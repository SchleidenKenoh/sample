<?php
  $accounts = array(
    "user1" => array(
      "username" => 'ken',
      "password" => 'ken',
      "type" => 'user'
    ),
    "user2" => array(
      "username" => 'admin',
      "password" => '123',
      "type" => 'admin'
    )
    );
  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    foreach($accounts as $keys => $value){
      if($username == $value['username'] && $password == $value['password']){
        if($value['type'] == 'admin'){
          header('Location: ../home/dashboard.php');
        }else{
          header('location: home.php');
        }
        
      }
    }
    $error = 'Invalid username/password. Try again.';
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="bod">
    <div class="center">
      <h1>Kenoh Customs</h1>
      <form action="login.php" method="post">
        <div class="txt_field">
          <input type="text" id="username" name="username"  required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" id="password" name="password"  required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"></div>
        <input type="submit" class="submit"  value="Login">
        <div class="signup_link">
          
        </div>
        <?php
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                    exit();
                }
                
            ?>
      </form>
    </div>

  </body>
</html>