<?php 
    namespace controllers;
    use views;
    use models;

    class loginController{
        public static function executar(){
            views\view::render('login');
        }

        public static function logar($user,$pass){
            if(models\loginModel::logar($user,$pass)){
                $_SESSION['loginCrm'] = true;
                self::redirect();
            }else{
                self::notify('Dados inválidos.','error');
                self::redirect();
            }
        }

        private static function notify($msg,$type){
            $_SESSION['notifyMsg'] = $msg;
            $_SESSION['notifyType'] = $type;
        }

        private static function redirect(){
            header('Location: '.ROOT_PATH);
            die();
        }
    }
?>