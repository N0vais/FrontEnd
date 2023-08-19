<?php 
    //resolver o problema de classes diferente//
    namespace Daniel\DataBase;

    abstract class Connect
    {
        private static $con;

        public static function getConn()
        {
            if(!self::$con)
            {
                self::$con = new \PDO('mysql: host=localhost; dbname=dados-gerais','root', '');
            }else{
                
                die("<h2> Erro de conexao com o banco:<?h2>");
            }
            return self::$con;
        } 
    }
?>