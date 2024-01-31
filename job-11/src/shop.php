<?php
    require_once '../vendor/autoload.php';

    $product = new App\Product();
    
    if(isset($_GET['page'])) {
        $products = $product->findPaginated($_GET['page']);
    }
    else {
        $products = $product->findPaginated(1);
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
    <table>
        <caption>Products</caption>
        <th>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
        </th>
        <tbody>
            <?php
                foreach($products as $product) {
                    echo '<tr>';
                    echo '<td>' . $product->getName() . '</td>';
                    echo '<td>' . $product->getPrice() . '</td>';
                    echo '<td>' . $product->getQuantity() . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>
