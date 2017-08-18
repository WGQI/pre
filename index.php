<?php
session_set_cookie_params(10800);
session_start();
if(!isset($_SESSION['id'])):
    header("location:login.php");
    else:
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title> Главная </title>
      <link href="css/style.css" media="screen" rel="stylesheet">
      <link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  </head>
  <body>
      <div id="welcome" >
          <div id="personal">
              <center>
                  <h2>Добро пожаловать,
                      <span id="userSpan">
                          <?php
                          require_once("php/includes/connection.php");
                          $arr[]=$_SESSION['id'];
                          $us=R::findOne('users','id = ?', $arr);
                          echo $us->email;
                          ?>
                      </span>
                  </h2>
              </center>
              <div class="tableContainer">
                  <?php include("php/selectPersonal.php");?>
              </div>
              <div class="formContainer container" id="reg">
                  <div id="login">
                      <form id="registerform" method="post" name="registerform">
                          <p><label for="user_pass">E-mail<br>
                                  <input class="input" id="email" name="email" size="129"type="email" value="" required></label></p>
                          <p><label for="user_pass">Пароль<br>
                                  <input class="input" id="password" name="password"size="64"   type="password" value="" required>
                                  <i class="fa fa-eye fa-2x" aria-hidden="true" title="Показать/Скрыть пароль" onclick="Show_HidePassword()"></i>
                              </label></p>
                          <p class="submit"><input class="button" id="submit" name= "submit" type="submit" value="Добавить"></p>
                          <br>
                          <p id="msg"></p>
                      </form>
                  </div>
              </div>
          </div>
          <div id="logout">
              <p><a href="logout.php">Выйти</a> из системы</p>
          </div>
      </div>
      <footer>
        © 2017 <a href="http://www.ystu.ru" >www.ystu.ru</a>. Все права защищены.
      </footer>
      <script src="js/addAjax.js"></script>
      <script src="js/delAjax.js"></script>
      <script src="js/animationBg.js"></script>
      <script src="js/showPass.js"></script>
  </body>
</html>
<?php endif; ?>


