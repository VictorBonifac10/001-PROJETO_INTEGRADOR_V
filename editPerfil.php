<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM clientes_prj5 WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $senha = $user_data['senha'];
                $nomeEmpresa = $user_data['nomeEmpresa'];
                $produtoEmpresa = $user_data['produtoEmpresa'];
                $cnpj = $user_data['cnpj'];
            }
        }
        else
        {
            header('Location: editPerfil.php');
        }
    }
    else
    {
        header('Location: editPerfil.php');
    }

    include("menuPerfil.php");
?>

<style>
    form {
        width: 100%;
    }

    .img-img {
        width: 115%;
        height: 100%;
    }
</style>

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-image">
                            <img class="img-img" src="assets/img/dest/dest1.jpg" width="500px" height="500px" alt="service" />
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">!</h1>
                                </div>
                                <form class="user" action="saveEditPerfil.php" method="POST">
                                    <style>.form-group{margin-bottom: 10px;}</style>
                                    <div class="form-group">
                                        <input type="text" name="nome" id="nome" class="form-control form-control-user" value="<?php echo $nome; ?>" placeholder="Nome Completo" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control form-control-user" value="<?php echo $email; ?>" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="senha" id="senha" class="form-control form-control-user" value="<?php echo $senha; ?>" placeholder="Senha" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input type="text" name="nomeEmpresa" id="nomeEmpresa" class="form-control form-control-user" value="<?php echo $nomeEmpresa; ?>" placeholder="Nome da Empresa" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="produtoEmpresa" id="produtoEmpresa" class="form-control form-control-user" value="<?php echo $produtoEmpresa; ?>" placeholder="Produto" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="cnpj" id="cnpj" class="form-control form-control-user" value="<?php echo $cnpj; ?>" placeholder="CNPJ" required>
                                    </div>
                                    <hr>
                                    <input class="inputSubmit btn btn-success btn-user btn-block" type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input class="btn btn-success btn-user btn-block" type="submit" name="update" id="submit" value="Alterar Dados!">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
