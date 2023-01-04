<?php
    class deliveryModel{
        public static $items = array(array('pizza.jpg','40.00','Pizza',),array('acai.jpg','12.00','Açai'),array('coxinha.png','3.00','Coxinha'));

        public static function listarItems(){
            return self::$items;
        }
        public static function addToCart($idProduto){
            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }
            $_SESSION['carrinho'][] = $idProduto;
        }
        public static function getItemsCart(){
            return $_SESSION['carrinho'];
        }
        public static function getItem($id){
            return self::$items[$id];
        }
        public static function getTotalPedido(){
            $valor = 0;
            foreach ($_SESSION['carrinho'] as $key => $value){
                $itemPreco = self::getItem($value)[1];
                $valor+=$itemPreco;
            }
            return $valor;
        }
        public static function convertMoney($valor){
            return number_format($valor,2,',','.');
            }
        }
    

?>