<?php 
    $validationCode = substr(md5(uniqid(rand(), true)),16,16);
    echo ($validationCode);
?>