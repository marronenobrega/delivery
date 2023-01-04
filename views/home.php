<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,400;0,500;1,400&family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400&family=Signika+Negative:wght@300;400;500;600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>/views/css/style.css">
    <link rel="stylesheet" href="views/css/fontawesome/css/all.min.css">
    <title>Sistema Delivery</title>
</head>
<body>
    <section class="header">
        <div class="container">
            <h2><i class="fa-solid fa-utensils"></i> Faça seu Pedido</h2>
            <a href="<?= INCLUDE_PATH ?>fechar-pedido"><i class="fa-solid fa-cart-shopping"></i> Fechar Pedido!</a>
            <div class="clear"></div>
        </div><!------Container------->
    </section>

    <section class="listar-produtos">
        <div class="container">
            <?php
                $sushis = deliveryModel::listarItems();
                foreach($sushis as $key=>$value){
            ?>
            <div class="box-single-food">
                <div class="card">
                <img src="<?php echo INCLUDE_PATH ?>images/<?= $value['0'] ?>">
                <h2><?= $value['2'] ?></h2>
                <p><i class="fa-solid fa-dollar-sign"></i> R$<?= deliveryModel::convertMoney($value['1']) ?></p>
                <a href="<?= INCLUDE_PATH ?>?addCart=<?= $key ?>"><i class="fa-solid fa-cart-shopping"></i> Adicionar ao Carrinho</a>
            </div>
                </div>
            <?php } ?> 
            <div class="clear"></div>
        </div>
    </section>
 
    
</body>
</html>