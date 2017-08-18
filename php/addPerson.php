<?php
$regFlag=false;
require_once ("includes/connection.php");
    if (!empty($_POST['section_name']) && !empty($_POST['password'])) {
        $email = @iconv("UTF-8", "windows-1251", $_POST['email']);

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
                $u=R::findOne('users','email = ?', (array)$email);
                echo json_encode(array("id"=>$u->id,"date"=>$u->date_created,"message"=>$message,"reg"=>"1"));
                $regFlag=true;
            }
        }
        else{
            $message = "Пароль должен содержать минимум 6 символов!";
        }
    }
    else {
        $message = "Не все поля заполнены!";
    }
    if(!$regFlag)echo json_encode(array("message"=>$message,"reg"=>"0"));
?>
