<?php
function __autoload($filename){
    include_once($filename.'.php');
}
?>