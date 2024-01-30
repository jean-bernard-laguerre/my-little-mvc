<?php
namespace App;
use PDO;

class Cart
{
    function __construct(
        private ?int $id = null,
        private ?int $id_user = null,
        ){
        

    }

        /**
         * Get the value of id
         *
         * @return ?int
         */
        public function getId(): ?int
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @param ?int $id
         *
         * @return self
         */
        public function setId(?int $id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of id_user
         *
         * @return ?int
         */
        public function getIdUser(): ?int
        {
                return $this->id_user;
        }

        /**
         * Set the value of id_user
         *
         * @param ?int $id_user
         *
         * @return self
         */
        public function setIdUser(?int $id_user): self
        {
                $this->id_user = $id_user;

                return $this;
        }

        public function createCart($idUser){
            $req = "INSERT INTO cart(id_user) VALUE(':idUser')";
            $db = new Database();
            $req = $db->bdd->prepare($req);
            $req->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $req->execute();
        }

        public function getCart($idUser)
        {
            $req = "SELECT * FROM cart WHERE id = :idUser";
            $db = new Database();
            $req = $db->bdd->prepare($req);
            $req->bindParam(":idUser", $idUser);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);
            $instance = new Cart($result['id'], $result['id_user']);
            return $instance;

        }

        public function addProduct($product_id, $quantity){
            $req = "INSERT INTO cart_product(id_product, id_quantity) VALUES(':id_product',':id_quantity')";
            $db = new Database();
            $req = $db->bdd->prepare($req);
            $req->bindParam("id", $this->id);
            $req->bindParam(":id_product", $product_id);
            $req->bindParam(":id_quantity", $quantity);
            $req->execute();

        }

        public function updateProduct($product_id, $quantity){
            $req = "UPDATE cart SET id_product = ':id_product', '':id_quantity' = ':id_quantity' ";
            $db = new Database();
            $req = $db->bdd->prepare($req);
            $req->bindParam(":id_product", $product_id);
            $req->bindParam(":id_quantity", $quantity);
            $req->execute();

        }

        public function deleteProduct($product_id){
        $req = "DELETE FROM cart WHERE id = ':id_product'";
        $db = new Database();
        $req = $db->bdd->prepare($req);
        $req->bindParam("id", $product_id);
        $req->execute();
        
        }



}
