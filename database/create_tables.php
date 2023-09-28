<?php
    include_once 'db_connect.php';//inclui o arquivo de conexão com o banco de dados
    $sql = "CREATE TABLE jogos(
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        edicao VARCHAR(255),
        status ENUM('adquirido', 'backlog') NOT NULL,
        lojas VARCHAR(255),
        plataformas VARCHAR(255),
        descricao TEXT,
        logo_url VARCHAR(255)
    )";//comando SQL para criar a tabela de jogos
    /*$sql = "CREATE TABLE plataformas(
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        imagem_url VARCHAR(255)
    );";//comando SQL para criar a tabela de plataformas
    $sql = "CREATE TABLE lojas(
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        imagem_url VARCHAR(255)
    );";//comando SQL para criar a tabela de lojas*/
    if(mysqli_query($conn, $sql)){//caso a tabela seja criada com sucesso, exibe uma mensagem de sucesso
        echo "Tabela criada com sucesso!";//mensagem de sucesso
    }else{//caso ocorra algum erro, exibe uma mensagem de erro
        echo "Erro ao criar a tabela de jogos: " . mysqli_error($conn);//mensagem de erro
    }
?>
