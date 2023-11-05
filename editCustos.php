<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM custos_prj5 WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $id = $user_data['id'];
                $mes = $user_data['mes'];
                $sementes= $user_data['sementes'];
                $fertilizante = $user_data['fertilizante'];
                $pesticida = $user_data['pesticida'];
                $adubo = $user_data['adubo'];
                $irrigacao = $user_data['irrigacao'];
            }
        }
        else
        {
            header('Location: custos.php');
        }
    }
    else
    {
        header('Location: custos.php');
}     

        //-------------------------------------------------------

        setlocale(LC_TIME, 'pt_BR');
        // Obtém o mês atual em português
        $mesAtual = strftime('%B');

        //-------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">
<br><br><br><br>
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4 py-3">
                                <div class="card-body">     
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cadastre seus custos do mês de <b><?php echo $mesAtual;?></h1></b>
                                    </div>
                                    <form class="user" action="saveEditCustos.php" method="POST"><style>.user-flex{display:flex;}</style>
                                        <div class="form-group user-flex">

                                            <input type="text" name="mes" class="InputUser form-control form-control-user"
                                             id="mes" placeholder="Sementes/Mudas" value="<?php echo date('F'); ?>" required>

                                            <input type="text"  name="sementes" class="InputUser form-control form-control-user "
                                            id="semente"  step="0.01" placeholder="Sementes/Mudas" value=<?php echo $sementes;?> required>
                                        </div>
                                        <div class="form-group user-flex">
                                        
                                        <input type="text"  name="fertilizante" class="InputUser form-control form-control-user"
                                                id="fertilizante" step="0.01" placeholder="Fertilizante" value=<?php echo $fertilizante;?> required>

                                            <input type="text"  name="pesticida" class="InputUser form-control form-control-user "
                                                id="pesticida"  step="0.01" placeholder="Pesticida" value=<?php echo $pesticida;?> required>
                                        </div>
                                        <div class="form-group user-flex">

                                        <input type="text"  name="adubo" class="InputUser form-control form-control-user "
                                                id="adubo" step="0.01"  placeholder="Adubo Orgânico" value=<?php echo $adubo;?>>
                                            
                                            <input type="text"  name="irrigacao" class="InputUser form-control form-control-user"
                                                id="irrigacao" step="0.01"  placeholder="Irrigação"  value=<?php echo $irrigacao;?> required>
                                        </div> 
                                        <input class="inputSubmit btn btn-success btn-user btn-block" type="hidden" name="id" value=<?php echo $id;?>>
                                        <input class="inputSubmit btn btn-success btn-user btn-block" type="submit" name="update" id="submit">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="custos.php">Cancelar Alteração</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>