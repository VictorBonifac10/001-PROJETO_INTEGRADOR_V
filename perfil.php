<?php 

session_start();
//print_r($_SESSION);

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true) )
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['email'];

//--------------------------------------------------------

include_once('config.php');

if(isset($_POST['submit'])){
    include_once('config.php');

    $solicitante = $_POST['solicitante'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $prazo = $_POST['prazo'];
    $valor = $_POST['valor'];

    $resultProduto = mysqli_query($conexao, "INSERT INTO produtos_prj5(solicitante, produto, quantidade, valor, prazo)
    VALUES ('$solicitante', '$produto', '$quantidade', '$valor', '$prazo')");

    // Redirecionamento após a operação
    header('#');

} elseif(isset($_POST['sub'])){
    $mes = $_POST['mes'];
    $sementes = $_POST['sementes'];
    $fertilizante = $_POST['fertilizante'];
    $pesticida = $_POST['pesticida'];
    $adubo = $_POST['adubo'];
    $irrigacao = $_POST['irrigacao'];

    $resultCustos = mysqli_query($conexao, "INSERT INTO custos_prj5(mes, sementes, fertilizante, pesticida, adubo, irrigacao)
    VALUES ('$mes','$sementes', '$fertilizante', '$pesticida', '$adubo', '$irrigacao')");

    // Redirecionamento após a operação
    header('#');
}

//--------------------------------------------------------

    include_once('config.php');

        //(NUMERO DE REGISTROS)
        // Consulta para contar o número de registros na tabela produtos_prj5
        $query = "SELECT COUNT(*) AS total_registros FROM produtos_prj5";
        $result = mysqli_query($conexao, $query);

        //(SOMA DOS VALORES)
        // Consulta para obter a soma dos valores da coluna "valor" na tabela "produtos_prj5"
        $query = "SELECT FORMAT(SUM(valor), 3) AS total_valores FROM produtos_prj5";
        $resultvalor = mysqli_query($conexao, $query);

        //(STATUS)
        // Consulta para contar o número de registros na tabela "produtos_prj5"
        $query = "SELECT COUNT(*) AS total_registros FROM produtos_prj5";
        $resultporcentagem = mysqli_query($conexao, $query);

        if ($resultporcentagem) {
            $row = mysqli_fetch_assoc($resultporcentagem);
            $totalReg = $row['total_registros'];
        
            // Defina um valor de referência (50 linhas) para calcular a porcentagem
            $valorReferencia = 50;
        
            // Calcule a porcentagem
            $porcentagemVendas = ($totalReg / $valorReferencia) * 100;
        }

        //-------------------------------------------------------

        // Recupere o valor da coluna 'produtoEmpresa' com base no email da pessoa logada
        $email = $_SESSION['email'];
        $query = "SELECT produtoEmpresa FROM clientes_prj5 WHERE email = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($produtoEmpresa);
        $stmt->fetch();

        //-------------------------------------------------------

        setlocale(LC_TIME, 'pt_BR');
        // Obtém o mês atual em português
        $mesAtual = strftime('%B');

        //-------------------------------------------------------

        // Obtém a data atual
        $dataAtual = date('Y-m-d');

        // Obtém o último dia do mês atual
        $ultimoDiaMes = date('Y-m-t', strtotime($dataAtual));

        // Calcula o número de dias restantes até o final do mês
        $diasRestantes = (int)date_diff(date_create($dataAtual), date_create($ultimoDiaMes))->format('%a');

        //-------------------------------------------------------
    
?>

                <?php 
                include('menuPerfil.php');
                ?>

                    <!-- Content Row -->
                    <div class="row">

                    <script src="darkMode.js"></script>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Req. Pendentes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    if ($result) {
                                                        $row = mysqli_fetch_assoc($result);
                                                        $totalRegistros = $row['total_registros'];
                                                    
                                                        echo "$totalRegistros Pendentes";
                                                    } else {
                                                        echo "Erro ao consultar o banco de dados.";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Valores a Receber</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php                                              
                                                    if ($resultvalor) {
                                                            $row = mysqli_fetch_assoc($resultvalor);
                                                            $totalValores = $row['total_valores'];

                                                            echo "R$ $totalValores";
                                                    } else {
                                                            echo "Erro ao consultar o banco de dados.";
                                                        }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Status de Venda</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php
                                                            // Defina os status com base na porcentagem
                                                            if ($totalReg >= $valorReferencia) {
                                                                $statusbom = "Boas";
                                                                echo "$statusbom ($porcentagemVendas%)";
                                                            } elseif ($totalReg >= 25) {
                                                                $statusmedio = "Médio";
                                                                echo "$statusmedio ($porcentagemVendas%)";
                                                            } elseif ($totalReg < 25) {
                                                                $statusruim = "Ruim";
                                                                echo "$statusruim ($porcentagemVendas%)";
                                                            }else{
                                                                echo "Erro ao consultar o banco de dados.";
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                                <?php
                                                    // Defina os status com base na porcentagem
                                                    if ($totalReg >= $valorReferencia) { ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-wink" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z"/>
                                                    </svg> <?php
                                                    }elseif($totalReg >= 25){ ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-neutral" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path d="M4 10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5zm3-4C7 5.672 6.552 5 6 5s-1 .672-1 1.5S5.448 8 6 8s1-.672 1-1.5zm4 0c0-.828-.448-1.5-1-1.5s-1 .672-1 1.5S9.448 8 10 8s1-.672 1-1.5z"/>
                                                    </svg><?php
                                                    }else{ ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                                                    </svg><?php
                                                    }
                                                ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ano</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    // Obtém o ano atual
                                                    $anoAtual = date("Y");

                                                    // Exibe o ano atual
                                                    echo "$anoAtual";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                                            <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   <?php
                        // Verifique se $produtoEmpresa é igual a "Alface" antes de exibir o conteúdo HTML
                        if ($produtoEmpresa === "Alface") {
                        include_once('card.php');
                        }
                        ?>
                <!-- /.container-fluid -->
        <hr><br><h1 class="h3 mb-2 text-gray-800">Custos de Produção Agrícola</h1>
            <p class="mb-4">
                Faço o cadastro de suas dispesas agricolas mensais e tenha o controle em suas mãos. Você pode compara-las e obter uma análise melhor no campo CUSTOS MENSAIS, em sua area de ferramentas.
                <b>ATENÇÃO: </b><?php echo "Faltam <b> $diasRestantes</b> dias para o final do mês."; ?>
            </p>  
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4 py-3">
                                <div class="card-body">     
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cadastre seus custos do mês de <b><?php echo $mesAtual;?></h1></b>
                                    </div>
                                    <form class="user" action="perfil.php" method="POST"><style>.user-flex{display:flex;}</style>
                                        <div class="form-group user-flex">

                                            <input type="text" name="mes" class="InputUser form-control form-control-user"
                                             id="mes" placeholder="Sementes/Mudas" value="<?php echo date('F'); ?>" required>

                                            <input type="text"  name="sementes" class="InputUser form-control form-control-user "
                                            id="semente"  step="0.01" placeholder="Sementes/Mudas" required>
                                        </div>
                                        <div class="form-group user-flex">
                                        
                                        <input type="text"  name="fertilizante" class="InputUser form-control form-control-user"
                                                id="fertilizante" step="0.01" placeholder="Fertilizante" required>

                                            <input type="text"  name="pesticida" class="InputUser form-control form-control-user "
                                                id="pesticida"  step="0.01" placeholder="Pesticida" required>
                                        </div>
                                        <div class="form-group user-flex">

                                        <input type="text"  name="adubo" class="InputUser form-control form-control-user "
                                                id="adubo" step="0.01"  placeholder="Adubo Orgânico">
                                            
                                            <input type="text"  name="irrigacao" class="InputUser form-control form-control-user"
                                                id="irrigacao" step="0.01"  placeholder="Irrigação" required>
                                        </div> 
                                        <input class="inputSubmit btn cor btn-user btn-block" type="submit" name="sub" value="Cadastrar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Content Row -->

         <hr><br><h1 class="h3 mb-2 text-gray-800">Gastos Mensais/Custos Elevados: </h1>
            <p class="mb-4">
                Analise os graficos abaixo e mantenha suas finaças em dia. No Grafico de linhas a esquerda você pode ver o aumento do seus gastos nos ultimos meses de acordo com o seu cadastro de gastos mensais.
                A direita você poderá analisar os gastos mais elevados de insumos agrícolas.
            </p> 
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <?php                                     
                                        include_once('charts.php');
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <?php                                     
                                        include_once('charts2.php');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

<!-- Outer Row -->

<hr><br><h1 class="h3 mb-2 text-gray-800">Requisições: </h1>
            <p class="mb-4">
                Faça o cadastro de suas Requisições/Pedidos abaixo e tenha um controle maior de sua suas solicitações no campo "REQUISIÇÕES" no menu localizado a esquerda de seu perfil
                mas <b>ATENÇÃO: </b><?php echo "Faltam <b> $diasRestantes</b> dias para o final do mês."; ?>
            </p> 

<div class="row justify-content-center">
<div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-image">
                <img src="assets/img/dest/dest3.jpg" width="500px" heigth="450px" alt="service" />
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4 form-custom">Cadastre uma Requisição!</h1>
                        </div>
                        <form class="user form-custom" action="perfil.php" method="POST"><style>.form-custom{margin-left:35px;}</style>
                            <div class="form-group">
                                <input type="text"  name="solicitante" class="InputUser form-control form-control-user"
                                    id="solicitante" placeholder="Solicitante" required>
                            </div>
                            <div class="form-group">
                                <input type="text"  name="produto" class="InputUser form-control form-control-user"
                                    id="produto" placeholder="Nome do Produto" required>
                            </div>
                            <div class="form-group">
                                <input type="number"  name="quantidade" class="InputUser form-control form-control-user"
                                    id="quantidade" placeholder="Quantidade" required>
                            </div>
                            <div class="form-group">
                                <input type="number"  name="valor" class="InputUser form-control form-control-user"
                                    id="valor" placeholder="Valor (R$)" required>
                            </div>
                            <div class="form-group">
                                <input type="date"  name="prazo" class="InputUser form-control form-control-user"
                                    id="prazo" placeholder="Prazo de Entrega" required>
                            </div>
                            
                            <hr>
                            <input class="inputSubmit btn cor btn-user btn-block" type="submit" name="submit" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>


</div><!-- End of Content Wrapper -->
</div><!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja Sair Mesmo?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" abaixo se você estiver pronto para encerrar sua sessão atual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="sair.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!---->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

</body>

</html>