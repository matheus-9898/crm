<?php 
    class aplication{
        public static function executar(){
            if(isset($_GET['ajax'])){   //AJAX
                switch ($_GET['ajax']) {
                    case 'addLista':
                        controllers\crmController::addLista($_POST['nomeLista']);
                        break;
                        
                    case 'getDados':
                        controllers\crmController::getDados();
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }

            if(isset($_GET['sair'])){
                controllers\crmController::sair();
            }
            if(isset($_POST['login'])){
                controllers\loginController::logar($_POST['usuario'],$_POST['senha']);
            }
            if(isset($_POST['cadastro'])){
                controllers\cadastroController::cadastrar($_POST['usuario'],$_POST['senha']);
            }
            if(isset($_SESSION['loginCrm'])){
                controllers\crmController::executar();
            }else{
                if(isset($_GET['url'])){
                    if(explode('/',$_GET['url'])[0] == 'cadastro')
                        controllers\cadastroController::executar();
                }else{
                    controllers\loginController::executar();
                }
            }
        }
    }
?>