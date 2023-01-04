<?php
    session_start();
    require('deliveryController.php');
    require('deliveryModel.php');

    define('INCLUDE_PATH','http://localhost/sistema_delivery/');


    $deliveryController = new deliveryController();

    $deliveryController->index();


?>