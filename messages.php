<?php
require_once 'common.php';
require_once 'dbfuncs.php';

if(!empty($_SESSION['authed']) && $_SESSION['authed'] === true) {
    if(!empty($_SESSION['userid'])) {
        $msgSQL = "select * from messages where user_id = " .
                    $_SESSION['userid'];
        $messages = getSelect($msgSQL);

        echo "<p>Mensagens</p>";
        echo "<table width='50%'>";
        echo "<tr><td>Assunto</td><td>Mensagem</td>";
        if(!empty($messages) && is_array($messages)) {
            foreach($messages as $message) {
                echo "<tr><td>" . $message[2] . "</td><td>" . $message[3] .
                "</td></tr>";
            }
        }
        echo "</table>";
    }
}