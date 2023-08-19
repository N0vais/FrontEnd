<?php

class Core
{
    private $url;
    private $controller;
    private $method ='index';
    private $params = array();
    private $user;
    private $error;

    public function __construct()
    {
        $this->user = $_SESSION['idUser'] ?? null;
        $this->error = $_SESSION['msg_error'] ?? null;


        if (isset($this->error)){
            if($this->error['count']=== 0){
              $_SESSION['msg_error']['count']++;
            }else{
                unset($_SESSION['msg_error']);
            }
        }
    }

    public function start($request)
    {
        if (isset($request['url'])) {
            $this->url = explode('/', $request['url']);

            $this->controller = ucfirst($this->url[0]).'Controller';
            array_shift($this->url);

            if(isset($this->url[0]) && $this->url != '')
            {
                $this->method = $this->url[0];
                array_shift($this->url);

                if(isset($this->url[0]) && $this->url != '')
                {
                    $this->params = $this->url;
                }
            }
        }

        //inicio das liberaçoes para o direcionamento das paginas de um usuario logado 1/2.
        
        if($this->user ){
            $permission = ['DashboardPainelController','DashboardUsuarioController',
                            ];

            if (isset($this->controller) && in_array($this->controller, $permission)) {
                switch ($this->controller) {
                    case 'DashboardPainelController':
                        $controller = new DashboardPainelController();      // case 1#
                        $controller->index();
                        break;
                    case 'DashboardUsuarioController':
                        $controller = new DashboardUsuarioController();     // case 2#
                        $controller->index();
                        break;
                   
                }
            } else {
                $controller = new DashboardPainelController();
                $controller->index();
            }       
        }else{
            $permission = ['LoginController'];
            if(!isset($this->controller) || !in_array($this->controller, $permission)){
                $this->controller = 'LoginController';
                $this->method = 'index';
            }    
        }
        
        //var_dump($this->controller,$this->method, $this->params );
        return call_user_func_array(array(new $this->controller,$this->method),$this->params);
    }

       
}
        
    
    
    


