<?php 
    namespace models;
    use PDO;

    class crmModel{
        public static function getListas(){
            $sql = mysqlModel::conexaoBD()->prepare('SELECT * FROM listas WHERE usuario_id=?');
            $sql->execute(array($_SESSION['idUsuario']));
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $info;
        }
        public static function getItens(){
            $sql = mysqlModel::conexaoBD()->prepare('SELECT * FROM itens');
            $sql->execute();
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $info;
        }

        public static function addLista($nomeLista){
            $sql = mysqlModel::conexaoBD()->prepare('INSERT INTO listas VALUES (?,?,?)');
            $sql->execute(array(null,$nomeLista,$_SESSION['idUsuario']));

            $data['addLista'] = true;
            die(json_encode($data));
        }

        public static function deleteLista($idLista){
            $sql = mysqlModel::conexaoBD()->prepare('DELETE FROM listas WHERE id=?');
            $sql->execute(array($idLista));

            $sql = mysqlModel::conexaoBD()->prepare('DELETE FROM itens WHERE lista_id=?');
            $sql->execute(array($idLista));

            $data['deleteLista'] = true;
            die(json_encode($data));
        }

        public static function editLista($idLista,$novoNome){
            $sql = mysqlModel::conexaoBD()->prepare('UPDATE listas SET nome=? WHERE id=?');
            $sql->execute(array($novoNome,$idLista));

            $data['editLista'] = true;
            die(json_encode($data));
        }
    }
?>