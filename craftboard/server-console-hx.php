<?php
    require 'account-common.php';
    $output = nl2br(shell_exec('docker logs '.$_GET["server_name"]));
    echo $output;
?>