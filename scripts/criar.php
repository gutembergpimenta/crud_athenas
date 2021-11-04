<?php

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dados['btCad'])) {
    $erro = false;
    $dados = array_map('trim', $dados);
    if (in_array("", $dados)) {
        $erro = true;
        echo '<div class="alert alert-danger" role="alert">
                ERRO: Existe campos vazios.
             </div>';
    } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erro = true;
        echo '<div class="alert alert-danger" role="alert">
                ERRO: este e-mail não é valido.
             </div>';
    }

    $sqlRow = "SELECT * FROM cadastro WHERE email=?";
    $pdoRow = $conn->prepare($sqlRow);
    $pdoRow->bindParam(1, $dados['email']);
    $pdoRow->execute();
    $pdoCount = $pdoRow->rowCount();
    if ($pdoCount > 0) {
        $erro = true;
        echo '<div class="alert alert-danger" role="alert">
                ERRO: este e-mail já está cadastrado.
             </div>';
    }


    if ($erro == false) {
        $sql = "INSERT INTO cadastro (nome, email, cod) value (?,?,?)";
        $pdo = $conn->prepare($sql);
        $pdo->bindParam(1, $dados['nome']);
        $pdo->bindParam(2, $dados['email']);
        $pdo->bindParam(3, $dados['cod']);
        $pdo->execute();
        echo '<div class="alert alert-success" role="alert">
                Usuario inserido com sucesso.
             </div>';
    }
}



?>
<form class="row g-3" action="" method="POST">
    <div class="col-md-12">
        <label for="validationDefault01" class="form-label">E-mail</label>
        <input name="email" type="text" class="form-control" id="validationDefault01">
    </div>

    <div class="col-md-9">
        <label for="validationDefault02" class="form-label">Nome</label>
        <input name="nome" type="text" class="form-control" id="validationDefault02">
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
        <input class="btn btn-primary" type="submit" name="btCad" value="Criar">

    </div>
</form>