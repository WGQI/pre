<?php
session_set_cookie_params(10800);
session_start();
if(isset($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = @iconv("UTF-8", "windows-1251", $_POST['email']);
        $email = addslashes($email);
        $email = htmlspecialchars($email);
        $email = stripslashes($email);

        $password= @iconv("UTF-8", "windows-1251", $_POST['password']);
        $password= addslashes($password);
        $password = htmlspecialchars($password);
        $password = stripslashes($password);

        $arr[]=$email;
		require_once("php/includes/connection.php");
        $us=R::findOne('users','email = ?', $arr);

        if ($us) {
            if ($us->password == $password) {
                $_SESSION["id"]=$us->id;
                echo "<script>window.location.href='index.php'</script>";
                //header("Location: index.php");
            }
            else{
                $message="Пароль введен неверно!";
            }
        }
        else{
            $message="Такого пользователя не существует!";
        }
    }
    else {
        $message = "Не все поля заполнены!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title> Авторизация </title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 </head>
 <body>
  <div class="container mlogin">
    <div id="login">
      <h1>Авторизация</h1>
         <form id="loginform" method="post"name="loginform">
            <p>
                <label for="user_login">E-mail<br>
                    <input  class="input" id="username" name="email"size="20"
                           type="text" value="" required>
                </label>
            </p>
            <p>
                <label for="user_pass" >Пароль<br>
                    <input  class="input" id="password" name="password"size="20"
                           type="password" value="" required>
                    <i class="fa fa-eye fa-2x" aria-hidden="true" title="Показать/Скрыть пароль" onclick="Show_HidePassword()"></i>
                </label>
                <input class="button" name="submit" type= "submit" value="Войти">
            </p>
         </form>
     </div>
   </div>
  <footer>
      © 2017 <a href="http://www.ystu.ru" >www.ystu.ru</a>. Все права защищены.
  </footer>
  <script src="js/animationBg.js"></script>
  <script src="js/showPass.js"></script>
 </body>
</html>

<?php
if (!empty($message)) {
    echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";
}
?>