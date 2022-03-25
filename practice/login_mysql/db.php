<?php
function getConnection() {
    $c = mysqli_connect ('localhost','root','','test');
    return $c ;
}
?>