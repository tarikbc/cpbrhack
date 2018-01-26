<?php
require_once 'common.php';
require_once 'dbfuncs.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_REQUEST['user']) && !empty($_REQUEST['subject'])
        && !empty($_REQUEST['message'])) {
        $msgSQL = "insert into messages(user_id, subject, message) values('" . 
                    $_REQUEST['user'] . "','" . $_REQUEST['subject'] . "','"
                    . $_REQUEST['message'] . "')";

        $inserted = insertQuery($msgSQL);
        if($inserted === false) {
            echo 'Bugou, rs';
        }
        else {
            echo 'Mensagem enviada!';
        }
    }
}
else {
    $userSQL  = "select id, firstname, surname from users";
    $userList = getSelect($userSQL);

    if(!$userList) die('Unable to retrieve users to message');
    $select = "<select name='user' id='user'>";
    foreach($userList as $user)
        $select .= "<option value='" . $user[0] . "'>" . $user[1]
        . " " . $user[2] . "</option>";
    $select .= "</select>";
?>
<form method="POST">
    <p>Selecione um usuario</p>
    <label for="user">Usuario:</label>
    <?=$select?> <br/>
    <label for="subject">Assunto:</label>
    <input name="subject" id="subject" /> <br />
    <label for="message">Mensagem:</label>
    <textarea rows="10" cols="50" name="message"></textarea>
    <input type="submit" value="Enviar">
</form>
<?
}
