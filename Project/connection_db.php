<?php 
$connect = new mysqli("localhost" , "root" , "" , "marketplaceultra");
if ($connect -> connect_errno){
    die("Could not connect: ". $connect -> connect_errno);
}
?>