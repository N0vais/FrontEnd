<?php

    session_start();
                //core 
    //aplicação que é chamada para fazer as solitação das paginas
    require_once ('app/core/Core.php');

                //conexão com o banco de dados
    require_once ('lib/Banco/DataBase/connet.php');

                // comtrollers
    //solicitação pagina inicial de login 1/1
    require_once ('app/controller/LoginController.php');

                //pagina de inicio do admin 
    require_once ('app/controller/DashboardPainelController.php');

                //pagina de inicio do usuario
    require_once ('app/controller/DashboardUsuarioController.php');

                //verifica se existe usurios logado
    require_once ('vendor/autoload.php');

    
    
    $core = new Core;
    echo $core->start($_GET);
?>