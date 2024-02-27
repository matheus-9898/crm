<?php 
    namespace controllers;
    use views;
    use models;

    class loginController{
        public static function executar(){
            views\view::render('login');
        }

        public static function logar($user,$pass){
            $result = models\loginModel::logar($user,$pass);
            if($result){
                $_SESSION['loginCrm'] = true;
                $_SESSION['idUsuario'] = $result['id'];
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