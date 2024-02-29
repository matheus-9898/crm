<?php 
    namespace views;

    class view{
        public static function render($file_name){
            include "pages/$file_name.php";
            include 'pages/templates/notify.php';
        }
    }
?>