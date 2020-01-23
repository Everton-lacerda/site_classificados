<?php 
require 'config/database.php';

if(empty($_SESSION['cLogin'])) {
    header("Location: login.php");
    exit;
}

require 'classes/AdvertModel.php';
$a = new Advert();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $a->deleteAdevert($_GET['id']);
}

header("Location: meus-anuncios.php");

?>