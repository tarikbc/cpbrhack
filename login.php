<?php
require_once 'common.php';
require_once 'dbfuncs.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_REQUEST['username']) && !empty($_REQUEST['password'])) {
        $authSQL = "select * from users where username = '" . $_REQUEST['username'] .
           "' and password = '" . $_REQUEST['password'] . "'"; 
        $authed = getSelect($authSQL);

        if(!$authed) {
            echo 'Informações incorretas.<br>';
            if($debug){
                echo $authSQL . "<br>";
            }
            die;
        }
        else {
            echo 'Sucesso! <br>';
            if($debug){
                echo $authSQL . "<br>";
            }
            $_SESSION['authed'] = true;
            $_SESSION['userid'] = $authed[0][0];
            $_SESSION['username'] = $authed[0][1];
        }
    }
}
else {
?>
<form method="POST">
    <label for="username">Login:</label>
    <input name="username" id="username" /> <br />
    <label for="password">Senha:</label>
    <input name="password" id="password" /> <br />
    <input type="submit" value="Login!">
</form>
<?
}
