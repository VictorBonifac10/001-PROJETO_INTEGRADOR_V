<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $solicitante = $_POST['solicitante'];
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $prazo = $_POST['prazo'];
                
        
        $sqlInsert = "UPDATE produtos_prj5
        SET solicitante='$solicitante',produto='$produto',quantidade='$quantidade',valor='$valor',prazo='$prazo'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: tables.php');

?>