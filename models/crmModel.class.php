<?php 
    namespace models;
    use PDO;

    class crmModel{
        public static function getListas(){
            $sql = mysqlModel::conexaoBD()->prepare('SELECT * FROM listas');
            $sql->execute();
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $info;
        }
        public static function getItens(){
            $sql = mysqlModel::conexaoBD()->prepare('SELECT * FROM itens');
            $sql->execute();
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $info;
        }
    }
?>