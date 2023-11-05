<?php 

if(isset($_POST['submit'])){
    //print_r('Nome: ' . $_POST['nome']);
    //print_r('<br>');
    //print_r('Email: ' . $_POST['email']);
    //print_r('<br>');
    //print_r('Telefone: ' . $_POST['telefone']);
    //print_r('<br>');
    //print_r('produtoEmpresa: ' . $_POST['produtoEmpresa']);
    //print_r('<br>');
    //print_r('CNPJ: ' . $_POST['cnpj']);
    //print_r('<br>');
    //print_r('Estado: ' . $_POST['estado']);

    include_once('config.php');
 
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nomeEmpresa = $_POST['nomeEmpresa'];
    $produtoEmpresa = $_POST['produtoEmpresa'];
    $cnpj = $_POST['cnpj'];

    $result = mysqli_query($conexao, "INSERT INTO clientes_prj5(nome,email,senha,nomeEmpresa,produtoEmpresa,cnpj)
    VALUES ('$nome','$email','$senha','$nomeEmpresa','$produtoEmpresa','$cnpj')");

    header("Location: log.php");

}

include("cabecalho.php");

?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-image">
                                
                            <img src="assets/img/dest/dest1.jpg" width="500px" heigth="500px" alt="service" />
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cadastre-se Agora!</h1>
                                    </div>
                                    <form class="user" action="cadst.php" method="POST"><style>.form-group{margin-bottom: 10px;}</style>
                                        <div class="form-group">
                                            <input type="text" name="nome" id="nome"
                                             class="form-control form-control-user" placeholder="Nome Completo" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email"
                                             class="form-control form-control-user" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="senha" id="senha"
                                             class="form-control form-control-user" placeholder="Senha" required>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <input type="text" name="nomeEmpresa" id="nomeEmpresa"
                                             class="form-control form-control-user" placeholder="Nome da Empresa" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="produtoEmpresa" id="produtoEmpresa"
                                             class="form-control form-control-user" placeholder="Produto" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="cnpj" id="cnpj"
                                             class="form-control form-control-user" placeholder="CNPJ" required>
                                        </div>
                                        <hr>
                                        <input class="btn btn-success btn-user btn-block" type="submit" name="submit" id="submit" value="Cadastre-se">
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="log.php">Já tenho uma Conta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php
include("footer.php");
?>