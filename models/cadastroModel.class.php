<?php 
    namespace models;

    class cadastroModel{
        public static function cadastrar($user,$pass){
            if(trim($user) != '' && trim($pass) != ''){

                $sql = mysqlModel::conexaoBD()->prepare('SELECT * FROM usuarios WHERE usuario=?');
                $sql->execute(array($user));
                if($sql->rowCount() == 0){
                    $sql = mysqlModel::conexaoBD()->prepare('INSERT INTO usuarios VALUES (?,?,?)');
                    $sql->execute(array(null,$user,$pass));
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }
    }
?>