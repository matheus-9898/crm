<?php 
    namespace views;

    class view{
        public static function render($file_name,$dados=null){
            include "pages/$file_name.php";
            include 'pages/templates/notify.php';
        }
    }
?>