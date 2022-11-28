<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Đăng Nhập</title>
  <base href="http://localhost:8080/mvcProject/">
  <link rel="stylesheet" href="public/assets/css/login.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <?php if(isset($message) && !empty($message)){ ?>
            <p style="color:red;margin-bottom: 10px;"><?php echo $message; ?></p>
        <?php } ?>
      <form action="login/auth" method="POST">
        <input type="text" name="user_name" placeholder="Nhập email">
        <input type="password" name="password" placeholder="Nhập password">
        <a href="#">Quên mật khẩu?</a>
        <input type="submit" class="button" name="btn_login" value="Đăng nhập">
      </form>
      <div class="signup">
        <span class="signup">Bạn chưa có tài khoản?
         <label> <a href="./register">Đăng kí</a> </label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>
