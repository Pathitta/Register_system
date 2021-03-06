<?php 
  session_start();
  include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>
  <link rel="icon" href="https://playserver.in.th/user_image/server_icon/68013_1885903143.jpg">
  <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="header">
      <h2>Login</h2>
    </div>

      <!--ให้actionไประบบเบื้องหลังเอาไว้check inputให้แจ้งerrorถ้าบันทึกไม่ได้ หรือให้ส่งข้อมูลไปบันทึกได้-->
    <form action="login_db.php" method="post">
          <!-- notification message -->
          <?php if (isset($_SESSION['error'])) : ?>
              <div class="error">
                  <h3>
                      <?php 
                          echo $_SESSION['error'];
                          unset($_SESSION['error']);
                      ?>
                  </h3>
              </div>
          <?php endif ?>
      <div class="input-group">
          <label for="username">Username</label>
          <input type="text" name="username">
      </div>
      <div class="input-group">
          <label for="password">Password</label>
          <input type="password" name="password">
      </div>
      <div class="input-group">
          <button type="submit" name="login_user" class="btn">Log in</button>
      </div>
      <p>Not yet a member? <a href="register.php">Sign in</a></p>
    </form>
</body>
</html>