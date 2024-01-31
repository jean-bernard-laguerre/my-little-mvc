<?php namespace App;

    class ShopController {

        public function index($page): array {
            
            $product = new Product();

            return $product->findPaginated($page);
        }

        public function showProduct($idProduct, $productType): AbstractProduct {
            
            $auth = new AuthenticationController();
            if ($auth->profile()) {
                $product = new $productType();
                return $product->findOneById($idProduct);
            } else {
                header('Location: /login');
            }
        }
    }
    