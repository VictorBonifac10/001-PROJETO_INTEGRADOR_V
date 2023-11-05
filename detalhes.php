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
    <title>Detalhes do Insumo</title>
    <style>
        /* Estilos (mesmos estilos anteriores para os cards) */
        .detalhes{
            margin-left: 25px;
            margin-top: -25px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 200px;
            cursor: pointer;
        }

        .bi-bug-fill, .bi-tree-fill{
            text-align: center;
            margin-right: 10px;
        }
    </style>
    <!-- Adicione o link do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        include_once('menuPerfil.php');
    ?>

    <h1 class="h3 mb-2 text-gray-800">Descrição: </h1>
    <p class="mb-4">
    Saiba mais sobre os inoculantes e os produtos para controle de pragas e plantas invasoras, registrados abaixo, que estão dentro do conceito de bioinsumos para a agricultura orgânica e outros sistemas produtivos.</div>
    </p><br>

    <div class="detalhes" id="detalhesInsumo">
        <!-- Aqui serão inseridas as informações detalhadas do insumo -->
    </div>

    <script>
        // Função para exibir os detalhes do insumo e suas pragas
        function exibirDetalhesInsumo() {
            var insumoDetalhado = JSON.parse(sessionStorage.getItem('insumoDetalhado'));
            var detalhesInsumo = document.getElementById('detalhesInsumo');

            if (insumoDetalhado) {
                var html ='<h2>' +  '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tree-fill" viewBox="0 0 16 16"><path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5z"/></svg>'+ insumoDetalhado.marcaComercial + ':</h2><br>';
                html += '<table class="table"><tbody>';
                html += '<tr><td><b>Nº de Registro:</b></td><td>' + insumoDetalhado.registroProduto + '</td></tr>';
                html += '<tr><td><b>Classe:</b></td><td>' + insumoDetalhado.classes + '</td></tr>';
                html += '<tr><td><b>Fabricante:</b></td><td>' + insumoDetalhado.titularRegistro + '</td></tr>';
                html += '<tr><td><b>Detalhes:</b></td><td>' + insumoDetalhado.ingredienteAtivo + '</td></tr>';
                html += '<tr><td><b>Classificação Toxicológica:</b></td><td>' + insumoDetalhado.classificacaoToxicologica + '</td></tr>';
                html += '<tr><td><b>Classificação Ambiental:</b></td><td>' + insumoDetalhado.classificacaoAmbiental + '</td></tr>';

                html +='<tr><td colspan="2"><h3><br>' + '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bug-fill" viewBox="0 0 16 16"><path d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z"/><path d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z"/></svg>' + 'Pragas</h3></td></tr>';

                insumoDetalhado.pragas.forEach(function(praga) {
                    html += '<tr><td><b>Cultura:</b></td><td>' + praga.cultura + '</td></tr>';
                    html += '<tr><td><b>Nome Científico:</b></td><td>' + praga.nomeCientifico + '</td></tr>';
                    html += '<tr><td><b>Nome Comum:</b></td><td><b>' + praga.nomeComum + '</b></td></tr>';
                    html += '<tr><td><b></b></td><td>' + '' + '</td></tr>';
                });

                html += '</tbody></table>';
                detalhesInsumo.innerHTML = html;
            } else {
                detalhesInsumo.innerHTML = 'Insumo não encontrado.';
            }
        }

        // Exibe os detalhes do insumo ao carregar a página
        exibirDetalhesInsumo();
    </script>
    
    <!-- Adicione o script do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
