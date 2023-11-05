<?php

    include_once('config.php');
    if(isset($_POST['update'])){

        $id = $_POST['id'];
        $mes = $_POST['mes'];
        $sementes = $_POST['sementes'];
        $fertilizante = $_POST['fertilizante'];
        $pesticida = $_POST['pesticida'];
        $adubo = $_POST['adubo'];
        $irrigacao = $_POST['irrigacao'];
    
        $sqlInsert = "UPDATE custos_prj5
         SET mes='$mes',sementes='$sementes',fertilizante='$fertilizante',pesticida='$pesticida',adubo='$adubo',irrigacao='$irrigacao'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }

        header('Location: custos.php');

?>