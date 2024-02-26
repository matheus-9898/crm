<?php 
    namespace controllers;
    use views;

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
    }
?>