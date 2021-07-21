<?php
    require_once("conexao/conexao.php");
?>
<?php
    session_start();
    if( !isset($_SESSION["user_portal"])){
        header("location:http://localhost/sistema_de_chamados/index.php/");
    }
?>
<?php
    $usuarioId  =   $_SESSION["user_portal"];
    $query      =   "SELECT * FROM ticktes";
    $dados      =   mysqli_query($conecta,$query ) or die("Erro no banco");
    $linha      =   mysqli_fetch_assoc($dados);
    $total      =   mysqli_num_rows($dados);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Meus Tickets</title>
    <style>
        <?php
            require_once("css/style.css");
        ?>
    </style>
</head>
<body>
    <main>
        <div id="div_principal">
            <div class="opacity">
                <div class="container-fluid">
                    <div class="row">
                            <?php
                                if($total > 0) {
                                    do {
                            ?>
                            <div class="col-md-4">
                                <div class="card" style="margin-top: 5%; padding:5%;">
                                    <h3 class="text-center"><?php echo $linha['nome']?></h1>
                                    <h6><?=$linha['setor']?></h6>
                                    <h6><?=$linha['data_atual']?></h6>
                                    <p><?=$linha['problema']?></p>
                                </div>
                            </div>
                            <?php
                                    }while($linha = mysqli_fetch_assoc($dados));
                                }
                            ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
    require_once("conexao/close_banc.php");
?>