<?php include("includes/head.php"); ?>
<?php require_once("includes/connection.php"); ?>
<div class="container mregister">
    <div id="login">
        <h1>Регистрация</h1>
        <form action="register.php" id="registerform" method="post"name="registerform">
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="email" name="email" size="129"type="email" value=""></label></p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password"size="64"   type="password" value=""></label></p>
            <p class="submit"><input class="button" id="submit" name= "submit" type="submit" value="Зарегистрировать"></p>
        </form>
    </div>
</div>
<?php
if(isset($_POST["submit"])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = @iconv("UTF-8", "windows-1251", $_POST['email']);
        $email = addslashes($email);
        $email = htmlspecialchars($email);
        $email = stripslashes($email);

        $password = @iconv("UTF-8", "windows-1251", $_POST['password']);
        $password = addslashes($password);
        $password = htmlspecialchars($password);
        $password = stripslashes($password);
        if (strlen($password) >= 6) {
            $arr[] = $email;
            $us = R::findOne('users', 'email = ?', $arr);
            if ($us) {
                $message = "Пользователь с таким e-mail уже существует!";
            } else {
                $user = R::dispense('users');
                $user->email = $email;
                $user->password = $password;
                $user->date_created = date("Y-m-d");
                $id = R::store($user);
                $message = "Пользователь зарегистрирован с id " ;
                $message .= $id;
            }
        }
        else{
                $message = "Пароль должен содержать минимум 6 символов!";
            }
    }
        else {
            $message = "Не все поля заполнены!";
    }
}

?>

<?php
if (!empty($message)) {
    echo "<p class=\"error\">" . "Сообщение: ". $message . "</p>";
}
?>

<?php include("includes/footer.php"); ?>
