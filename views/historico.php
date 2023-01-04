<?php
    if(!isset($_SESSION['tipo_pagamento'])){
        die('Você não tem itens no carrinho e não fechou o pedido');
    }

?>

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
</head>

<section class="header2">
<h2><i class="fa-solid fa-location-dot"></i> Pedido em Andamento: </h2>
<h2><?php echo ucfirst($_SESSION[ 'tipo_pagamento']); ?></h2>
<a id="home" href="<?= INCLUDE_PATH ?>home">Voltar para Home</a>
<div class="clear"></div>
</section>




    <div class="container">
    <h2 style="color:white;"><i class="fa-solid fa-cart-shopping"></i> Seu Carrinho</h2>
    <div class="clear"></div>
</div><!------Container------->
</section>

<body>

<div class="container">
<table width="100%">
    <tr>
        <td></td>
        <td id="preco">Preço</td>
    </tr>
<?php
   $carrinhoItems = deliveryModel::getItemsCart();
   foreach ($carrinhoItems as $key => $value){
    $item = deliveryModel::getItem($value);
?>
    <tr>
        <td style="text-align:center;">
            <?= $item[2]; ?>
        </td>
        <td>
            <p id="preco">R$<?= deliveryModel::convertMoney($item[1]); ?></p>
        </td>
    </tr>
<?php
   }
?>
</table>
<br />
<section class="dinheiro">
<p style="color:white;" id="total2">Total: <?php echo deliveryModel::convertMoney($_SESSION['total']); ?></p>

<?php
    if($_SESSION['tipo_pagamento'] == 'dinheiro'){
        echo '<hr>';
        echo '<p>Troco: '.deliveryModel::convertMoney($_SESSION['valor_troco']).'</p>';
    }
?>

<br />

<section class="resetar">
   <a href="<?php echo INCLUDE_PATH ?>historico?resetar">Pedido Entregue!</a>

   <?php
        if(isset($_GET['resetar'])){
            session_destroy();
            header('Location: '.INCLUDE_PATH);
        }

   ?>
</section>

    </body>


</html>