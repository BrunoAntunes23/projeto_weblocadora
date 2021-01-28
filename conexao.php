<?php
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='root';
    $conn=new mysqli($dbhost,$dbuser,$dbpass,);
    if($conn->connect_error){
        die("Conexão invalida".$conn->connect_error);

    }
    echo "Conexão sucedida";
    ?>