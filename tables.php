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

?>
                <?php 
                    include('menuPerfil.php');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Requisições</h1>
                    <p class="mb-4">
                        Aqui, você encontrará informações detalhadas sobre todas as interações e solicitações feitas por nossos usuários.
                        Esta página é uma ferramenta poderosa para monitorar o desempenho do sistema e garantir que todas as requisições
                        sejam atendidas de forma eficiente.<b> ATENÇÃO: </b><?php echo "Faltam <b> $diasRestantes</b> dias para o final do mês. Você já conclui seus pedidos!"; ?>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Requisições Cadastradas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Solicitante</th>
                                            <th scope="col">Produto</th>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Prazo</th>
                                            <th scope="col">Finalizar/Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($user_data = mysqli_fetch_assoc($result))
                                            {
                                                echo "<tr>";
                                                echo "<td>".$user_data['id']."</td>";
                                                echo "<td>".$user_data['solicitante']."</td>";
                                                echo "<td>".$user_data['produto']."</td>";
                                                echo "<td>".$user_data['quantidade']."</td>";
                                                echo "<td>".$user_data['valor']."</td>";
                                                echo "<td>".$user_data['prazo']."</td>";
                                                echo "<td><center>
                                                <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#successModal' data-id='$user_data[id]'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
                                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                                        <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
                                                    </svg>     
                                                </a>
                                                <a class='btn btn-sm btn-primary' href='editlogin.php?id=$user_data[id]'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                                    </svg>
                                                </a>
                                                </center></td>";
                                                echo "</tr>";
                                            
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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

    <!-- Success Modal-->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja concluir esta requisição?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione <b>"Concluir"</b> abaixo se você estiver pronto para concluir esta requisição. Ao concluir, ela <b>não</b> estará mais visivel em sua lista de Req.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" href="delete.php" >Concluir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- PHP para o funcionamento do delete-->
    <?php
        if(!empty($_GET['id'])) {
            include_once('config.php');
            $id = $_GET['id'];
            
            // Certifique-se de que o ID seja um número válido
            if(is_numeric($id)) {
                $sqlDelete = "DELETE FROM produtos_prj5 WHERE id=$id";
                $resultDelete = $conexao->query($sqlDelete);
                header('Location: tables.php');
                exit;
            } else {
                // ID inválido, faça o tratamento apropriado aqui
            }
        } else {
            // ID não foi fornecido, faça o tratamento apropriado aqui
        }
    ?>


    <!-- JavaScript-
    <script>
        var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") 
            {
                searchData();
            }
        });

        function searchData()
        {
            window.location = 'sistema.php?search='+search.value;
        }
    </script>-->

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

    <!-- Script para o funcionamento do delete -->
    <script>
        $('#successModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-footer a').attr('href', 'delete.php?id=' + id);
        });
    </script>




</body>

</html>