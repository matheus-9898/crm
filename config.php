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

    define('ROOT_PATH','https://matheusm.online/crm/');

    date_default_timezone_set('America/Sao_Paulo');

    define('HOST','162.241.2.230');
    define('BDNAME','ondigc37_crm');
    define('USER','ondigc37_matheus');
    define('PASS','Stifler.28');
?>