<?php namespace App;

    class ShopController {

        public function index($page): array {
            
            $product = new Product();

            return $product->findPaginated($page);
        }
    }
