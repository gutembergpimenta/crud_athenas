<?php

if (isset($_GET['id'])) {
    if (isset($_POST['resp'])) {
        $id = $_GET['id'];
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if ($dados['resp'] == 'sim') {
            $sql = "DELETE FROM cadastro WHERE id=?";
            $pdoDel = $conn->prepare($sql);
            $pdoDel->bindParam(1, $id);
            $pdoDel->execute();
            $countRow = $pdoDel->rowCount();

            if ($countRow < 1) {
                header('Location: index.php?ir=ler');
            }

            echo '<div class="alert alert-success   " role="alert">
                   DADOS DELETADO COM SUCESSO.
                 </div>';
        } elseif ($dados['resp'] == 'nao') {
            header('Location: index.php?ir=ler');
        }
    }
} else {
    header('Location: index.php?ir=criar');
}




?>
<form action="" method="post">
    <div class="container border m-2 rounded-3 bg-danger p-2 text-white bg-opacity-10">
        <div class="row">
            <div class="col-12">
                VOCÊ DESEJA REALMENTE DELETAR ESSE CADASTRO ?
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="resp" value="sim" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        SIM
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="resp" value="nao" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        NÃO
                    </label>
                </div>
            </div>
        </div>
    </div>

    <input type="submit" value="Confirmar">
</form>