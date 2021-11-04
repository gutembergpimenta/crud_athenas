<?php
require_once("config/conn.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <style>
    .link-01 {
        text-decoration: none;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>SISTEMA DE CRUD - GUTEMBERG</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-5 bg-dark text-info bg-gradient text-center fs-1 ">SISTEMA DE CRUD - GUTEMBERG</div>
            </div>
            <div class="col-12">
                <div class="bg-secondary p-1 text-info bg-gradient">
                    <!-- <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">DETALHES</a></li>
                        <li class="page-item"><a class="page-link" href="#">CRIAR</a></li>
                        <li class="page-item"><a class="page-link" href="#">EDITAR</a></li>
                        <li class="page-item"><a class="page-link" href="#">DELETAR</a></li>
                    </ul> -->
                    <nav class="navbar navbar-light">
                        <div class="container-fluid text-start">
                            <a class="navbar-brand" href="index.php?ir=criar">
                                <img src="img/icon/add.svg" alt="" width="30" height="24"
                                    class="d-inline-block align-text-top">
                                CRIAR
                            </a>
                            <a class="navbar-brand" href="index.php?ir=editar">
                                <img src="img/icon/add.svg" alt="" width="30" height="24"
                                    class="d-inline-block align-text-top">
                                EDITAR
                            </a>
                            <a class="navbar-brand" href="index.php?ir=deletar">
                                <img src="img/icon/add.svg" alt="" width="30" height="24"
                                    class="d-inline-block align-text-top">
                                DELETAR
                            </a>
                            <a class="navbar-brand" href="index.php?ir=ler">
                                <img src="img/icon/ler.svg" alt="" width="30" height="24"
                                    class="d-inline-block align-text-top">
                                LER
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="com-12">
                <div class="p-5 page text-info text-center bg-dark bg-gradient">
                    <?php
                    if (isset($_GET['ir'])) {
                        switch ($_GET['ir']) {
                            case 'criar':
                                require_once('scripts/criar.php');
                                break;

                            case 'ler':
                                require_once('scripts/ler.php');
                                break;

                            case 'editar':
                                require_once('scripts/editar.php');
                                break;

                            case 'deletar':
                                require_once('scripts/deletar.php');
                                break;

                            default:
                                require_once('index.php?ir=criar');
                                break;
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>