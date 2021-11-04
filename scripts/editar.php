<style>
.link {
    text-decoration: none;
    color: brown;
}
</style>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM cadastro WHERE id=?";
    $pdo = $conn->prepare($sql);
    $pdo->bindParam(1, $id);
    $pdo->execute();
    $pdoFetch = $pdo->fetch(PDO::FETCH_ASSOC);
} else {
    echo '<script> alert("* * * * * * * *     Seu time fez " + pontos + " pontos    * * * * * * * *" ); </script>';
    header('Location: index.php?ir=criar');
}

if (isset($_POST['btEdit'])) {
    $id = $_GET['id'];


    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erro = false;

    $sqlRowEmail = "SELECT * FROM cadastro WHERE email=?";
    $pdoRowEmail = $conn->prepare($sqlRowEmail);
    $pdoRowEmail->bindParam(1, $dados['email']);
    $pdoRowEmail->execute();
    $countEmail = $pdoRowEmail->rowCount();
    $fetchEmail = $pdoRowEmail->fetch(PDO::FETCH_ASSOC);

    if ($countEmail > 0) {
        if ($fetchEmail['id'] == $id) {
            $erro = false;
        } else {
            $erro = true;
            echo '<div class="alert alert-danger" role="alert">
                    ERRO: este email já esta cadastrado em outro cadastro.
                </div>';
        }
    }

    if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erro = true;
        echo '<div class="alert alert-danger" role="alert">
                ERRO: digite um email valido.
             </div>';
    }


    if ($erro == false) {
        $sql = 'UPDATE cadastro SET nome=?,  email=?, cod=? WHERE id=' . $id . '';
        $pdo = $conn->prepare($sql);
        $pdo->bindParam(1, $dados['nome']);
        $pdo->bindParam(2, $dados['email']);
        $pdo->bindParam(3, $dados['cod']);
        $pdo->execute();

        echo '<div class="alert alert-success" role="alert">
                Dados editados com sucesso. <a class="link" href="index.php?ir=ler">clique aqui</a> para voltar para a lista.
             </div>';
    }
}
?>

<form class="row g-3" action="" method="POST">
    <div class="col-md-12">
        <label for="validationDefault01" class="form-label">E-mail</label>
        <input name="email" type="text" class="form-control" value="<?php echo $pdoFetch['email']; ?>"
            id="validationDefault01">
    </div>

    <div class="col-md-9">
        <label for="validationDefault02" class="form-label">Nome</label>
        <input name="nome" type="text" value="<?php echo $pdoFetch['nome']; ?>" class="form-control"
            id="validationDefault02">
    </div>

    <div class="col-md-3">
        <label for="validationDefault04" class="form-label">Codigo</label>
        <select name="cod" class="form-select" id="validationDefault04">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
        <div class="form-text ">1 = ADMIN </div>
        <div class="form-text ">2 = GERENTE </div>
        <div class="form-text ">3 = NORMAL </div>
    </div>

    <div class="col-12">
        <input class="btn btn-primary" type="submit" name="btEdit" value="EDITAR">

    </div>
</form>