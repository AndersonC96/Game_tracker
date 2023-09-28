<?php
    include_once 'includes/header.php';// Inclui o arquivo header.php
    include_once 'database/db_connect.php';// Inclui o arquivo db_connect.php
    $sql = "SELECT * FROM jogos ORDER BY id DESC LIMIT 1";// Query para selecionar o último jogo cadastrado
    $result = mysqli_query($conn, $sql);// Executa a query
    if(mysqli_num_rows($result) > 0){// Verifica se o resultado da query é maior que 0
        $row = mysqli_fetch_assoc($result);// Transforma o resultado em um array associativo
        $ultimoJogo = $row;// Atribui o array associativo a uma variável
    } else {
        $ultimoJogo = null;// Se não houver nenhum jogo cadastrado, atribui null a variável
    }
?>
<div class="jumbotron">
    <p class="lead">Bem-vindo ao Game Tracker. Aqui você pode gerenciar sua coleção de jogos.</p>
</div>
<div class="row">
    <div class="col-md-8">
        <?php if ($ultimoJogo) : ?>
            <h2>Último Jogo Cadastrado</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $ultimoJogo['nome']; ?></h5>
                    <p class="card-text"><?php echo $ultimoJogo['descricao']; ?></p>
                    <p>Plataforma(s): <?php echo $ultimoJogo['plataformas']; ?></p>
                    <p>Loja(s): <?php echo $ultimoJogo['lojas']; ?></p>
                </div>
            </div>
        <?php else : ?>
            <p>Nenhum jogo cadastrado ainda.</p>
        <?php endif; ?>
    </div>
</div>
<?php
    include_once 'includes/footer.php';// Inclui o arquivo footer.php
?>