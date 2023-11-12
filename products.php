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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 7;
            margin-bottom: 7px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <?php
        include_once('menuPerfil.php');
    ?>

    <div class="container-fluid">
        
        <h1 class="h3 mb-2 text-gray-800">Lista de Insumos:</h1>
        <p class="mb-4">
            Tenha acesso a uma lista completa de Insumos Ôrganicos e Não Ôrganicos para o controle de Parasitas e Plantas Invasoras durante o seu cultivo.
            <b>Clique</b> em um dos itens abaixo e saiba quais Parasitas podem ser combatidos com o uso destas matérias.
        </p> 

        <div class="text-center mb-4">
            <button class="btn btn-light border-bottom-success border-left-success" id="btnOrganicos">Orgânicos</button>
            <button class="btn btn-light border-bottom-success border-left-success" id="btnNaoOrganicos">Não Orgânicos</button>
        </div>

        <div class="row justify-content-center" id="insumosContainer">
            <!-- Aqui serão inseridos os cards de insumos -->
        </div>
    </div>

    <script>
        var allInsumos = []; // Array para armazenar todos os insumos

        // Função para buscar a lista de insumos
        function getListaInsumos() {
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        allInsumos = JSON.parse(xhr.responseText).data;
                        exibirInsumos(allInsumos); // Exibe todos os insumos ao carregar a página
                    } else {
                        document.getElementById('insumosContainer').innerHTML = 'Erro ao carregar os insumos.';
                    }
                }
            };

            // Aqui, você deve substituir 'sua_api_aqui' pelo endpoint correto da sua API
            xhr.open('GET', 'api.php');
            xhr.send();
        }

        // Função para exibir os insumos na página
        function exibirInsumos(insumos) {
            var insumosContainer = document.getElementById('insumosContainer');
            insumosContainer.innerHTML = ''; // Limpa os insumos anteriores

            insumos.forEach(function(insumo) {
                var card = document.createElement('div');
                card.className = 'card col-12 col-sm-6 col-md-4 col-lg-3'; // Ocupa 4 colunas em telas pequenas, 2 em médias e 3 em grandes
                card.textContent = insumo.marcaComercial;

                // Redireciona para a página de detalhes do insumo
                card.addEventListener('click', function() {
                    sessionStorage.setItem('insumoDetalhado', JSON.stringify(insumo));
                    window.location.href = 'detalhes.php';
                });

                insumosContainer.appendChild(card);
            });
        }

        // Filtra os insumos de acordo com o parâmetro (true/false)
        function filtrarInsumos(isOrganico) {
            var insumosFiltrados = allInsumos.filter(function(insumo) {
                return insumo.aprovadoParaAgriculturaOrganica === isOrganico;
            });

            exibirInsumos(insumosFiltrados);
        }

        // Ao clicar no botão "Orgânicos", filtra os insumos orgânicos
        document.getElementById('btnOrganicos').addEventListener('click', function() {
            filtrarInsumos(true);
        });

        // Ao clicar no botão "Não Orgânicos", filtra os insumos não orgânicos
        document.getElementById('btnNaoOrganicos').addEventListener('click', function() {
            filtrarInsumos(false);
        });

        // Carrega a lista de insumos ao carregar a página
        getListaInsumos();
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
