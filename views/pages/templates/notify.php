<?php //notificação aqui
    if(isset($_SESSION['notifyMsg']) && isset($_SESSION['notifyType'])){
        $msg = $_SESSION['notifyMsg'];
        $type = $_SESSION['notifyType'];
        echo "<script>
            $(function(){
                $.notify('$msg','$type');
            })
        </script>";
        $_SESSION['notifyMsg'] = null;
        $_SESSION['notifyType'] = null;
    }
?>