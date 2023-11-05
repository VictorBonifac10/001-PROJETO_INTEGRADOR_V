<?php 
error_reporting(E_ALL);

    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        //Acessa
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //print_r('Email: ' . $email);
        //print_r('<br>');
        //print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM clientes_prj5 WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        //print_r($sql);
        //print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
           
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: log.php');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: perfil.php');
        } 

    }else{
        //Nao Acessa
        header('Location: log.php');
    }

?>