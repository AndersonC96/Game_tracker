<?php
    include_once 'includes/header.php';
    include_once 'database/db_connect.php';
    $sql = "SELECT * FROM jogos";
    $result = mysqli_query($conn, $sql);
?>
<div class="container">
    <h2>Jogos Cadastrados</h2>
    <?php if (mysqli_num_rows($result) > 0) : ?>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $row['logo_url']; ?>" class="card-img-top" alt="Logo do Jogo">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nome']; ?></h5>
                            <p class="card-text"><?php echo $row['descricao']; ?></p>
                            <p class="card-text">Plataformas: <?php echo $row['plataformas']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Nenhum jogo cadastrado encontrado.</p>
    <?php endif; ?>
</div>
<?php
    include_once 'includes/footer.php';
?>