<?php
    include_once 'includes/header.php';
    include_once 'database/db_connect.php';
    include_once './api/api.php';
    $sqlPlataformas = "SELECT * FROM plataformas";
    $resultPlataformas = mysqli_query($conn, $sqlPlataformas);
    $sqlLojas = "SELECT * FROM lojas";
    $resultLojas = mysqli_query($conn, $sqlLojas);
    $descricao = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $edicao = $_POST["edicao"];
        $status = $_POST["status"];
        $lojas = implode(", ", $_POST["lojas"]);
        $plataformas = implode(", ", $_POST["plataformas"]);
        $jogo_rawg = $_POST["jogo_rawg"];
        if(!empty($jogo_rawg)){
            $api_key = RAWG_API_KEY;
            $descricao = getGameDescriptionFromAPI($api_key, $jogo_rawg);
        }
        $sql = "INSERT INTO jogos (nome, edicao, status, lojas, plataformas, descricao) VALUES ('$nome', '$edicao', '$status', '$lojas', '$plataformas', '$descricao')";
        if(mysqli_query($conn, $sql)){
            echo '<div class="alert alert-success" role="alert">Jogo cadastrado com sucesso!</div>';
        }else{
            echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar o jogo: ' . mysqli_error($conn) . '</div>';
        }
    }
?>
<div class="container">
    <h2>Cadastrar Novo Jogo</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="form-group">
            <label for="jogo_rawg">Nome do Jogo (Busca na RAWG.io)</label>
            <input type="text" class="form-control" name="jogo_rawg">
        </div>
        <div class="form-group">
            <label for="nome"><b>Nome do Jogo</b></label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="form-group">
            <label for="edicao"><b>Edição</b></label>
            <input type="text" class="form-control" name="edicao">
        </div>
        <div class="form-group">
            <label for="status"><b>Status</b></label>
            <select class="form-control" name="status" required>
                <option value="Finalizei">Abandonado</option>
                <option value="Finalizei">Finalizado</option>
                <option value="Jogando">Jogando</option>
                <option value="Joguei">Jogado</option>
                <option value="Quero Jogar">Quero Jogar</option>
                <option value="Não">Não</option>
            </select>
        </div>
        <div class="form-group">
            <label for="lojas"><b>Lojas</b></label>
            <select class="form-control" name="lojas[]" multiple required>
                <?php
                    while($rowLoja = mysqli_fetch_assoc($resultLojas)){
                        echo '<option value="' . $rowLoja['id'] . '">' . $rowLoja['nome'] . '</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="plataformas"><b>Plataformas</b></label>
            <select class="form-control" name="plataformas[]" multiple required>
                <?php
                    while($rowPlataforma = mysqli_fetch_assoc($resultPlataformas)){
                        echo '<option value="' . $rowPlataforma['id'] . '">' . $rowPlataforma['nome'] . '</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao"><b>Descrição</b></label>
            <textarea class="form-control" name="descricao" rows="4" readonly><?php echo $descricao; ?></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
<?php
    include_once 'includes/footer.php';
?>