<?php
$debug = true;



session_start();
if(isset($_SESSION['userid'])){
$links = array(
                'Minha conta' => '/index.php?id='.$_SESSION['userid'],
                'Login' => '/login.php', 
                'Enviar Mensagem' => '/sendmessage.php', 
                'Ver Mensagens' => '/messages.php', 
                'Editar Conta' => '/editprofile.php'
          );
}else{
    $links = array(
                'Minha conta' => '/index.php?id='.$_SESSION['userid'],
                'Login' => '/login.php', 
                'Enviar Mensagem' => '/sendmessage.php', 
                'Ver Mensagens' => '/messages.php', 
                'Editar Conta' => '/editprofile.php'
          );
}
if(!empty($_SESSION['authed']) && $_SESSION['authed'] === true) {
    echo 'Logado: ' . $_SESSION['username'] . ' [' . $_SESSION['userid']
    . ']<br/><br/>';
}
foreach($links as $title => $link) {
    echo "<a href='" . $link . "'>" . $title . "<a> | ";
}
echo "<br/><hr/>";
