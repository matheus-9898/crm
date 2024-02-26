<?php 
    namespace controllers;
    use views;
    use models;

    class cadastroController{
        public static function executar(){
            views\view::render('cadastro');
        }

        public static function cadastrar($user,$pass){
            if(models\cadastroModel::cadastrar($user,$pass)){
                self::notify('Usuário cadastrado.','success');
                self::redirect();
            }else{
                self::notify('Dados inválidos ou usuário já cadastrado.','error');
                self::redirect('cadastro');
            }
        }

        private static function notify($msg,$type){
            $_SESSION['notifyMsg'] = $msg;
            $_SESSION['notifyType'] = $type;
        }

        private static function redirect($compUrl = ''){
            header('Location: '.ROOT_PATH.$compUrl);
            die();
        }
    }
?>