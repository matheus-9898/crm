<?php 
    namespace models;
    use PDO;

    class loginModel{
        public static function logar($user,$pass){
            $sql = mysqlModel::conexaoBD()->prepare('SELECT * FROM usuarios WHERE usuario=? AND senha=?');
            $sql->execute(array($user,$pass));
            if($sql->rowCount() == 1){
                $info = $sql->fetch(PDO::FETCH_ASSOC);
                return $info;
            }else{
                return false;
            }
        }
    }
?>