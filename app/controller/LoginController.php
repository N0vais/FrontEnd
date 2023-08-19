<!--pagina inicial de login 1/3-->

<?php
    
    require_once ('app/model/user.php');
    class LoginController
    {
        public function index()
        {
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);
            $templete = $twig->load('login.html');

            $parameters['error'] = $_SESSION['msg_error'] ?? null;

            return $templete->render($parameters);
        }
        public function check()
        {
            try{
                $user = new User;
                $user->setEmail($_POST['email']);
                $user->setSenha($_POST['senha']);
                $user->validate();
                
                header('Location:#');
            }catch(\Exception $e)
            {
                $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
                header('Location: http://localhost/ERPWEB/');
                exit;
            }
            
        }
    }
?>