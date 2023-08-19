<!--usuario painel 1/1-->
<?php

    class DashboardUsuarioController
    {
        public function index()
        {
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);
            $templete = $twig->load('#');

            $parameters['nome_user'] = $_SESSION['idUser']['nome_user'];

            return $templete->render($parameters);
           // echo ' logado com susesso usuario !<a href="http://localhost/ERPWEB/dashboardusuario/logout">sair</a>';
        } 
            public function logout()
            {
                unset($_SESSION['idUser']);
                session_destroy();
                header('Location: http://localhost/ERPWEB');
            }
            
       
    }
?>