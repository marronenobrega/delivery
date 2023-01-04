<?php
    if(!isset($_SESSION['carrinho'])){
        die('Você não tem itens no carrinho');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,400;0,500;1,400&family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400&family=Signika+Negative:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>/views/css/style.css">
    <link rel="stylesheet" href="views/css/fontawesome/css/all.min.css">
    <title>Sistema Delivery</title>
</head>
<body>
    <section class="header">
        <div class="container">
            <h2><i class="fa-solid fa-cart-shopping"></i> Seu Carrinho</h2>
            <a href="<?= INCLUDE_PATH ?>home">Voltar para Home</a>
            <div class="clear"></div>
        </div><!------Container------->
    </section>

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
                <td>
                    <img src="<?php echo INCLUDE_PATH.'images/'.$item[0] ?>"/>
                    
                </td>
                <td>
                    <p id="preco">R$<?= $item[1]; ?></p>
                </td>
            </tr>
        <?php
           }
        ?>
        </table>
        <br />

        <p id="total">Total do seu pedido foi: <b>R$ <?php echo number_format(deliveryModel::getTotalPedido(), 2, ',',' '); ?></b></p>
        <br />
        <br />

        <form method="post">
            <h3 style="color:white;"><i class="fa-solid fa-sack-dollar"></i> Escolha seu método de pagamento:</h3>
            <select name="opcao_pagamento">
                <option value="cartao credito">Cartão de Crédito</option>
                <option value="cartao debito">Cartão de Debito</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <div style="display:none;"class="troco">
            <br />
                <p style="color:white;"><b>Troco para quanto?</b></p>
                <input name="troco" type="text"  placeholder="R$ 00,00">
            </div>
            <input type="submit" name="acao" value="Fechar Pedido!">
            </form>
        </div>
        <br />
        <br />

    <?php
        if(isset($_POST['acao'])){
            if(!isset($_SESSION['carrinho'])){
                die('Você não tem itens no carrinho');
            }
            $metodoPagamento = $_POST['opcao_pagamento'];
            $_SESSION['tipo_pagamento'] = $metodoPagamento;
            $_SESSION['total'] = deliveryModel::getTotalPedido();
            if($metodoPagamento == 'dinheiro'){
            
                if($_POST['troco'] != ''){ 
                    $valorTroco =  $_POST['troco'] - deliveryModel::getTotalPedido();
                if($valorTroco >= 0){
                    $_SESSION['valor_troco'] = $valorTroco;
                    
                }else{
                    die('Você não especificou um valor correto!');
                }
                    
                }else{
                    die('Você escolheu dinheiro como pagamento, portanto especifique o troco!');
                }
            }
            echo '<script>alert("Seu pedido foi efetuado com sucesso!")</script>';
            echo '<script>location.href="'.INCLUDE_PATH.'historico"</script>';
        }

    ?>




    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $('select').change(function(){
            if($(this).val() == 'dinheiro'){
                $('.troco').show();

            }else{
                $('.troco').hide();
            }
        })
    </script>


</body>
</html>