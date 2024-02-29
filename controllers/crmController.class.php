<?php 
    namespace controllers;
    use views;
    use models;

    class crmController{
        public static function executar(){
            views\view::render('crm');
        }
        public static function sair(){
            session_destroy();
            self::redirect();
        }

        private static function notify($msg,$type){
            $_SESSION['notifyMsg'] = $msg;
            $_SESSION['notifyType'] = $type;
        }

        private static function redirect(){
            header('Location: '.ROOT_PATH);
            die();
        }

        public static function getDados(){
                $listas = models\crmModel::getListas();
                $itens = models\crmModel::getItens();

                $dados = [];
                
                foreach ($listas as $keyListas => $valListas) {

                    $i = 0;

                    $dados[$keyListas]['idLista'] = $valListas['id'];
                    $dados[$keyListas]['nomeLista'] = $valListas['nome'];

                    foreach ($itens as $keyItens => $valItens) {

                        if($valItens['lista_id'] == $valListas['id']){
                            $dados[$keyListas][$i]=[
                                'idItem' => $valItens['id'],
                                'nomeItem' => $valItens['nome'],
                                'telefone' => $valItens['telefone'],
                                'endereco' => $valItens['endereco'],
                                'email' => $valItens['email'],
                            ];
                            $i++;
                        }
                    }

                }

                $data['dados'] = $dados;
                die(json_encode($data));
        }

        public static function addLista($nomeLista){
            models\crmModel::addLista($nomeLista);
        }

        public static function deleteLista($idLista){
            models\crmModel::deleteLista($idLista);
        }
        
        public static function editLista($idLista,$novoNome){
            models\crmModel::editLista($idLista,$novoNome);
        }
        
        public static function addItem($idLista,$nome,$tel,$end,$email){
            models\crmModel::addItem($idLista,$nome,$tel,$end,$email);
        }
        
        public static function deleteItem($idItem){
            models\crmModel::deleteItem($idItem);
        }

        public static function editItem($idItem,$novoNome,$novoTel,$novoEnd,$novoEmail){
            models\crmModel::editItem($idItem,$novoNome,$novoTel,$novoEnd,$novoEmail);
        }
    }
?>