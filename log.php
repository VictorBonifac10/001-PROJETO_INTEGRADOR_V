<?php
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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <img src="assets/img/dest/irrigacao.jpg" width="517px" heigth="315px" alt="service" />
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bem vindo de Volta!</h1>
                                    </div>
                                    <form class="user" action="testLogin.php" method="POST">
                                        <div class="form-group">            
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Email">
                                        </div><br>
                                        <div class="form-group">            
                                            <input type="password" name="senha" class="form-control form-control-user" placeholder="Senha">
                                        </div>
                                        <hr>
                                        <center><input class="inputSubmit btn btn-success" type="submit" name="submit" value="Entrar">
</center>
                                    </form>
                                    <div class="text-center"> 
                                        <a class="small" href="cadst.php">Não tem uma Conta? Registre-se Agora!</a>
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