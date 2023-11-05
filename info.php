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
                    <h1 class="h3 mb-2 text-gray-800">Informações da Produção Primária da Alface:</h1>
                    <p class="mb-4">
                    Na seção de <b>Bio Insumos</b>, fornecemos informações essenciais sobre o uso de insumos orgânicos para controlar pragas e plantas invasoras. Descubra diretrizes práticas para práticas agrícolas mais sustentáveis.
                    Já na seção de <b>Diretrizes na Produção Agrícola</b>, abordamos a interação crucial entre água, solo e clima. Essas diretrizes visam otimizar a produção e promover a sustentabilidade ambiental.

                    </p>

                    <?php

                        include_once('card2.php');

                    ?>

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