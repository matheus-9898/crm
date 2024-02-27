<?php 
    namespace controllers;
    use views;
    use models;

    class crmController{
        public static function executar(){
            views\view::render('crm',self::getDados());
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

                $dados[$keyListas]['nomeLista'] = $valListas['nome'];

                foreach ($itens as $keyItens => $valItens) {

                    if($valItens['lista_id'] == $valListas['id']){
                        $dados[$keyListas][$i]=[
                            'nome' => $valItens['nome'],
                            'telefone' => $valItens['telefone'],
                            'endereco' => $valItens['endereco'],
                            'email' => $valItens['email'],
                        ];
                        $i++;
                    }
                }

            }

            return $dados;
        }
    }
?>