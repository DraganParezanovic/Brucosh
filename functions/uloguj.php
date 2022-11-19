<?php


function uloguj($id, $uloga){
    $_SESSION["id"] = $id;
    $_SESSION["uloga"] = $uloga;

}
?>