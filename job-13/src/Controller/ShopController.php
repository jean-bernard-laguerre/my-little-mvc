<?php namespace App;

    class ShopController {

        public function __construct(
            private ?Cart $cart = null,
            private ?User $user = null,
        ) {

        }

        public function getCart(): Cart {
            return $this->cart;
        }
        public function setCart(Cart $cart): void {
            $this->cart = $cart;
        }
        public function getUser(): User {
            return $this->user;
        }
        public function setUser(User $user): void {
            $this->user = $user;
        }

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

        public function addProductToCart($quantity, $productId) {
            
            $this->cart ??= new Cart();
            if ($this->user) {
                $this->cart->setIdUser($this->user->getId());
                $this->cart = $this->cart->getCart($this->user->getId());
            }

            if(!$this->cart) {
                $this->cart = new Cart();
                $this->cart->setIdUser($this->user->getId());
                $this->cart->createCart($this->user->getId());
            }
            
            $this->cart->addProduct($productId, $quantity);
        }
    }
    