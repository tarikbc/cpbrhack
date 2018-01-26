<?php
require_once 'common.php';
require_once 'dbfuncs.php';

if (isset($_GET['username'])){
    $getUser = $_GET["username"];
    $query   = "select * from users where username = '" . $getUser . "'";
	$results = getSelect($query);
}else{
    if (isset($_GET['id'])){
        $getId = $_GET["id"];
        $query   = "select * from users where id = '" . $getId . "'";
	    $results = getSelect($query);
    }else{
        $getUser = "";
        echo "Bem vindo!";

    }
}



if(isset($results)) {
    
    
    if($debug){
        echo $query . "<br>";
    }
    foreach($results as $row) {
        echo "<b>Id:</b> " . $row[0] . "<br>";
        echo "<b>Login: </b>" . $row[1] . "<br>";
        echo "<b>Senha: </b>" . $row[2] . "<br>";
        echo "<b>Nome: </b>" . $row[3] . "<br>";
        echo "<b>Sobrenome: </b>" . $row[4] . "<br>";
        echo "<b>Email: </b>" . $row[5] . "<br>";
    }
}
