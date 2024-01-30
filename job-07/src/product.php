<?php

    require_once '../vendor/autoload.php';

    $errorMessage = null;

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $clothing = new App\Clothing();
        $electronic = new App\Electronic();

        $product = $clothing->findOneById($id);
        var_dump($product);
        if(!$product) {
            $product = $electronic->findOneById($id);
        }
        if(!$product) {
            $errorMessage = 'Le produit demandé n\'est pas disponible';
        }
    }

    else {
        $errorMessage = 'Aucun produit n\'a été demandé';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><?= $errorMessage ?></div>
    <div>
        <?php if($product): ?>
            <h1><?= $product->getName() ?></h1>
            <img src="<?= $product->getPhoto()[0] ?>" alt="">
            <p><?= $product->getPrice() ?></p>
            <p><?= $product->getDescription() ?></p>
            <p><?= $product->getQuantity() ?></p>
            <p><?= $product->getCreatedAt()->format('Y-m-d') ?></p>
            <p><?= $product->getUpdatedAt()->format('Y-m-d') ?></p>
            <p><?= $product->getIdCategory() ?></p>
            <?php if($product instanceof App\Clothing): ?>
                <p><?= $product->getSize() ?></p>
                <p><?= $product->getColor() ?></p>
                <p><?= $product->getType() ?></p>
                <p><?= $product->getMaterialFee() ?></p>
            <?php elseif($product instanceof App\Electronic): ?>
                <p><?= $product->getBrand() ?></p>
                <p><?= $product->getWarrantyFee() ?></p>
            <?php endif ?>
        <?php endif ?>
    </div>
</body>
</html>