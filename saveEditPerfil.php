<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nomeEmpresa = $_POST['nomeEmpresa'];
        $produtoEmpresa = $_POST['produtoEmpresa'];
        $cnpj = $_POST['cnpj'];
        
        $sqlInsert = "UPDATE clientes_prj5
        SET nome='$nome',email='$email',senha='$senha',nomeEmpresa='$nomeEmpresa',produtoEmpresa='$produtoEmpresa',cnpj='$cnpj'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: editPerfil.php');

?>
