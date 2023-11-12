
<?php 

session_start();
include_once('config.php');
// print_r($_SESSION);
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: perfil.php');
}
$logado = $_SESSION['email'];
if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sql = "SELECT * FROM produtos_prj5 WHERE id LIKE '%$data%' or solicitante LIKE '%$data%' or produto LIKE '%$data%' ORDER BY id DESC";
}
else
{
    $sql = "SELECT * FROM produtos_prj5 ORDER BY id DESC";
}
$result = $conexao->query($sql);

?>

                <?php 
                    include('menuPerfil.php');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Insumos na produção primária da Alface:</h1>
                    <p class="mb-4">
                        Aqui, você encontrará informações detalhadas sobre todas as interações e solicitações feitas por nossos usuários. Esta página é uma ferramenta poderosa para monitorar o desempenho do sistema e garantir que todas as requisições sejam atendidas de forma eficiente.
                    </p>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4 py-3 border-left-success">
                                    <div class="card-body"> <style>.card-titulo{display: flex;} .card-body{margin:10px; text-align: justify;} </style>
                                        <div class="card-titulo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-droplet-fill" viewBox="0 0 16 16">
                                                    <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6ZM6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13Z"/>
                                                </svg>

                                                <h1 class="h3 mb-2 text-gray-800">Água:</h1><br><br>
                                        </div>
                                        <hr>
                                        <p>Devido ao seu sistema radicular superficial, assim como outras culturas folhosas, a alface precisa de uma irrigação bem controlada.

                                            Antes de tudo, é importante entender que cada cultura de hortaliça necessita de uma quantidade de água ideal em determinado momento do seu desenvolvimento. No caso da alface, esses momentos são na formação da cabeça e antes da colheita.

                                            Apesar da boa adaptação aos climas brasileiros, a alface é bem suscetível ao estresse hídrico. Esse processo pode ocorrer diante de uma umidade excessiva ou deficiente no solo.

                                            O estresse hídrico pode levar a um baixo rendimento da produção, má qualidade ou apodrecimento das raízes. Este último é causado principalmente quando se encharca o solo por um longo tempo, o que diminui a concentração de oxigênio na atmosfera do solo.</p>

                                            <br>

                                        <p> A irrigação por aspersão autopropelida também permite a inclusão de elementos químicos na água, que são essenciais ao desenvolvimento da planta, como potássio e fósforo, no início do plantio, e nitrogênio, na fase de crescimento.

                                            Sulcos de infiltração, microaspersão e gotejamento são outras formas comuns de irrigação para o plantio de alface no país.

                                            Para garantir uma qualidade e rendimento ideais na produção, é preciso que o déficit de água na plantação fique entre 20% e 30%.</p>

                                            <div class="card mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-success">Déficit de água na plantação</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-1 small">Irigação em 20% </div>
                                                    <div class="progress mb-4">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%"
                                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="mb-1 small">Irrigação em 80%</div>
                                                    <div class="progress mb-4">
                                                        <div class="progress-bar" role="progressbar" style="width: 30%"
                                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    Use the <code>.progress-sm</code> class along with <code>.progress</code>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                         <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4 py-3 border-left-success">
                                <div class="card-body"> <style>.card-titulo{display: flex;} .card-body{margin:10px; text-align: justify;} </style>
                                        <div class="card-titulo">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cloud-drizzle-fill" viewBox="0 0 16 16">
                                                <path d="M4.158 12.025a.5.5 0 0 1 .316.633l-.5 1.5a.5.5 0 0 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.317zm6 0a.5.5 0 0 1 .316.633l-.5 1.5a.5.5 0 0 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.317zm-3.5 1.5a.5.5 0 0 1 .316.633l-.5 1.5a.5.5 0 0 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.317zm6 0a.5.5 0 0 1 .316.633l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.317zm.747-8.498a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 11H13a3 3 0 0 0 .405-5.973z"/>
                                            </svg>
                                                <h1 class="h3 mb-2 text-gray-800">Clima:</h1><br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>