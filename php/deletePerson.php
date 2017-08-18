<?php
require_once("includes/connection.php");
$us=R::findOne('users','id = ?', (array)$_POST['paramId']);
R::trash($us);
?>