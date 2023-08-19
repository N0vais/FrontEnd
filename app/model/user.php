<!--verifica se tem algun usuario 1/3-->

<?php

use Daniel\DataBase\Connect;

    class User extends Connect
    {
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $sit;
        
        //validação do login//
        //padrão de projeto singtons//
        public function validate()
        {
            $con = Connect::getConn();
            
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $sql = $con->prepare($sql);
            $sql->bindValue(':email', $this->email);
            $sql->bindValue(":senha", md5($this->senha));
            $sql->execute();

            if($sql->rowCount() > 0 )
            {
                $result = $sql->fetch();

                $_SESSION['idUser'] = array(
                    'id_user' => $result['id'], 
                    'nome_user' => $result['nome'],
                    'email_user' => $result['email']
                );
                $adm = $result['sit'];
                if($adm == 1){
                    header('Location:http://localhost/ERPWEB/dashboardpainel');
                    exit();
                }else{
                    header('Location:http://localhost/ERPWEB/dashboardusuario');
                    exit();
                }
                return true;                    
            }else{
                throw new \Exception('Login invalido');
            }
        }
        
        //seters//
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        public function setSenha($senha)
        {
            $this->senha = $senha;
        }
        public function setSit($sit)
        {
            $this->sit = $sit;
        }
        //geters//
        public function getEmail()
        {
            return $this->email;
        }
        public function getName()
        {
            return $this->nome;
        }
        public function getSenha()
        {
            return $this->senha;
        }
        public function getSit()
        {
            return $this->sit;
        }
    }
?>