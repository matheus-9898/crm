<?php 
    namespace models;
    use PDO;
    use Exception;

    class mysqlModel{
        private static $pdo;

        public static function conexaoBD(){
            if(self::$pdo == null){

                try{
                    self::$pdo = new PDO('mysql:host='.HOST.';dbname='.BDNAME,USER,PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                }catch(Exception $erroBD){
                    die('Erro ao conectar com banco de dados...');
                }
            }
            return self::$pdo;
        }
    }
?>