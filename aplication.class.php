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
                    case 'deleteLista':
                        controllers\crmController::deleteLista($_POST['idLista']);
                        break;
                    case 'editLista':
                        controllers\crmController::editLista($_POST['idLista'],$_POST['novoNome']);
                        break;
                    case 'addItem':
                        controllers\crmController::addItem($_POST['idLista'],$_POST['nome'],$_POST['tel'],$_POST['end'],$_POST['email']);
                        break;
                    case 'deleteItem':
                        controllers\crmController::deleteItem($_POST['idItem']);
                        break;
                    case 'editItem':
                        controllers\crmController::editItem($_POST['idItem'],$_POST['novoNome'],$_POST['novoTel'],$_POST['novoEnd'],$_POST['novoEmail']);
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