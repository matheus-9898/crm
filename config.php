<?php 
    session_start();

    function autoload($class){
        $class = str_replace('\\','/',$class);

        if(file_exists("$class.class.php"))
            include "$class.class.php";
        else
            echo 'Controlador não encontrado.';
    }
    spl_autoload_register('autoload');

    define('ROOT_PATH','http://localhost/projetos/crm/');

    date_default_timezone_set('America/Sao_Paulo');

    define('HOST','localhost');
    define('BDNAME','crm');
    define('USER','root');
    define('PASS','');
?>