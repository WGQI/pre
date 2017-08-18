<?php
$users = R::findAll('users');

echo("
  <table id=\"personalTable\">
    <caption>
      Сотрудники
    </caption>
    <tr>
      <th>id</th>
      <th>E-mail</th>
      <th>Пароль</th>
      <th>Дата регистрации</th>
      <th>Удаление</th>
    </tr>");
foreach ($users as $u) {
    echo("<tr><td>" . $u->id . "</td><td>" . $u->email . "</td><td>" . $u->password . "</td><td>" . $u->date_created . "</td><td><button class='button'id='" . $u->id . "'>Удалить</button></td></tr>
  ");
    }
   echo("</table>")
?>