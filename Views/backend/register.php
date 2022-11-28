<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Đăng Kí</title>
  <base href="http://localhost:8080/mvcProject/">
  <!---Custom CSS File--->
  <link rel="stylesheet" href="public/assets/css/login.css">
  <style>
    .container .registration{
        display: block !important;
    }
    .has-err{
        color: red;
        margin-bottom: 10px;
    }
  </style>
</head>
<body>
    <div class="container">
        <div class="registration form">
            <header>Signup</header>
            <form action="register/valRegister" method="POST">
                <input type="text" name="user_name" placeholder="Enter your email">
                <?php if(isset($err['err_username'])){ ?>
                    <p class="has-err"><?php echo $err['err_username']; ?></p>
                <?php } ?>
                <input type="password" name="password" placeholder="Create a password">
                <?php if(isset($err['err_password'])){ ?>
                    <p class="has-err"><?php echo $err['err_password']; ?></p>
                <?php } ?>
                <input type="password" name="confirm_password" placeholder="Confirm your password">
                <?php if(isset($err['err_confirmpass'])){ ?>
                    <p class="has-err"><?php echo $err['err_confirmpass']; ?></p>
                <?php } ?>
                <input type="submit" class="button" name="btn_register" value="Signup">
            </form>
            <div class="signup">
                <span class="signup">Bạn đã có tài khoản?
                <label for="check"> <a href="./login">Đăng Nhập</a> </label>
                </span>
            </div>
        </div>
    </div>
</body>
</html>