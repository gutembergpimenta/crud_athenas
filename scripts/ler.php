<?php

    $sql = "SELECT * FROM cadastro ";
    $pdo = $conn->prepare($sql);
    $pdo->execute();

?>

<div class="row text-dark fw-bold bg-success bg-gradient">
    <div class="col-1 border">
        ID
    </div>
    <div class="col-4 border">
        NOME
    </div>
    <div class="col-5 border">
        EMAIL
    </div>
    <div class="col-1 border">
        CODIGO
    </div>
    <div class="col-1 border">
        #
    </div>
</div>
<?php

$sqlRow = $pdo->rowCount();
if ($sqlRow > 0) {
    while ($sqlFetch = $pdo->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="row">
                <div class="col-1 border">' . $sqlFetch['id'] . '</div>
                <div class="col-4 border">' . $sqlFetch['nome'] . '</div>
                <div class="col-5 border">' . $sqlFetch['email'] . '</div>
                <div class="col-1 border">' . $sqlFetch['cod'] . '</div>
                <div class="col-1 border">
                    <a href="index.php?ir=editar&id=' . $sqlFetch['id'] . '"> EDITAR </a>
                    <a href="index.php?ir=deletar&id=' . $sqlFetch['id'] . '"> DELETAR </a>
                </div>
            </div>';
    }
} else {
    echo '<div class="alert-danger" role="alert">
                Não existe nenhum usuario cadastrado.
         </div>';
}
?>