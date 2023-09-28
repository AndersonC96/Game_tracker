<?php
    $hostname = "localhost";//nome do host do banco de dados
    $username = "root";//nome do usuário do banco de dados
    $password = "";//senha do banco de dados
    $database = "";//nome do banco de dados
    $conn = mysqli_connect($hostname, $username, $password, $database);//conexão com o banco de dados
    if(!$conn){//caso a conexão falhe, exibe uma mensagem de erro
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());//mensagem de erro
    }
?>
