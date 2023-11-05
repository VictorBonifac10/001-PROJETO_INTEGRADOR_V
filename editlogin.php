<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM produtos_prj5 WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $id = $user_data['id'];
                $solicitante = $user_data['solicitante'];
                $produto = $user_data['produto'];
                $quantidade = $user_data['quantidade'];
                $valor = $user_data['valor'];
                $prazo = $user_data['prazo'];
            }
        }
        else
        {
            header('Location: tables.php');
        }
    }
    else
    {
        header('Location: tables.php');
    }        

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

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-image">  
                                <img src="assets/img/dest/dest3.jpg" width="470px" heigth="450px" alt="service" />
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Alterar Dados!</h1>
                                    </div>
                                    <form action="saveEdit.php" method="POST">
                                        <div class="form-group">
                                            <input type="text"  name="solicitante" class="InputUser form-control form-control-user"
                                                id="solicitante" value=<?php echo $solicitante;?> placeholder="Solicitante" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="produto" class="InputUser form-control form-control-user"
                                                id="produto" value=<?php echo $produto;?>  placeholder="Nome do Produto" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number"  name="quantidade" class="InputUser form-control form-control-user"
                                                id="quantidade" value=<?php echo $quantidade;?> placeholder="Quantidade" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number"  name="valor" class="InputUser form-control form-control-user"
                                                id="valor" value=<?php echo $valor;?> placeholder="Valor (R$)" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="date"  name="prazo" class="InputUser form-control form-control-user"
                                                id="prazo" value=<?php echo $prazo;?> placeholder="Prazo de Entrega" required>
                                        </div>
                                        <hr>
                                        <input class="inputSubmit btn btn-success btn-user btn-block" type="hidden" name="id" value=<?php echo $id;?>>
                                        <input class="inputSubmit btn btn-success btn-user btn-block" type="submit" name="update" id="submit">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="tables.php">Cancelar Alteração</a>
                                    </div>
                                </div>
                            </div>
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