<?php
    class deliveryController{
        public function index(){
            $url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
            $slug = explode('/',$url)[0];

            if(file_exists('views/'.$slug.'.php')){
                include('views/'.$slug.'.php');
                $this->validarCarrinho();
            }else{
                die('Essa página não existe');
            }
        }

        public function validarCarrinho(){
            if(isset($_GET['addCart'])){
                $idProduto = (int)$_GET['addCart'];
                deliveryModel::addToCart($idProduto);
                echo'<script>alert("Produto Adicionado ao carrinho")</script>';
            }
        }
    }

?>