<?php
    require 'account-common.php';
    require 'lang.php';
    include 'common.php';
    echo '<div class="bg-light h-100 p-4">';
    echo "<title>".$_GET["server_name"].' - '.$lang['logs']."</title>";
    echo "<p style=\"font-family:Ubuntu\" hx-get=\"/server-console-hx.php?server_name=".$_GET["server_name"]."\" hx-trigger=\"load, every 1s\" hx-swap=\"innerHTML\"></p>";
    echo "<p style=\"color:blue; font-family:Ubuntu\">".$lang['refreshinfomessage']."</p>";
    echo '<form action="server-sendtostdin.php" method="post" autocomplete="off">
    <input class="form-control" style="width: 70%; display: inline;" "type="text" id="command" name="command" >
    <input type="hidden" id="servername" name="servername" value='. $_GET["server_name"] .'>
    <input class="btn btn-lg btn-primary" type="submit" value="'.$lang['executecommand'].'">
    </form><br>';
    echo '</div>';
    echo "<script>window.scrollTo(0, document.body.scrollHeight);</script>";
?>