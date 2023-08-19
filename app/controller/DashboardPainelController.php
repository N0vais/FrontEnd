<!--admin painel 1/1-->
<?php

    class DashboardPainelController
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
            //este parameter vai para a view do painel comtroler.

            return $templete->render($parameters); 
        }
        public function logout()
        {
            unset($_SESSION['idUser']);

            session_destroy();

            header('Location: http://localhost/ERPWEB');
        }
    }
