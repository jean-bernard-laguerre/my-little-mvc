<?php
    require_once '../vendor/autoload.php';

    $clothing = new App\Clothing();
    $AllClothing = $clothing->findAll();

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
        <caption>Clothing</caption>
        <th>
            <td>Id</td>
            <td>Name</td>
            <td>Price</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Created_at</td>
            <td>Updated_at</td>
            <td>Id_category</td>
            <td>Size</td>
            <td>Color</td>
            <td>Type</td>
            <td>Material_fee</td>
        </th>
        <tbody>
            <?php
                foreach($AllClothing as $clothing) {
                    echo '<tr>';
                    echo '<td>' . $clothing->getId() . '</td>';
                    echo '<td>' . $clothing->getName() . '</td>';
                    echo '<td>' . $clothing->getPrice() . '</td>';
                    echo '<td>' . $clothing->getDescription() . '</td>';
                    echo '<td>' . $clothing->getQuantity() . '</td>';
                    echo '<td>' . $clothing->getCreatedAt()->format('Y-m-d') . '</td>';
                    echo '<td>' . $clothing->getUpdatedAt()->format('Y-m-d') . '</td>';
                    echo '<td>' . $clothing->getIdCategory() . '</td>';
                    echo '<td>' . $clothing->getSize() . '</td>';
                    echo '<td>' . $clothing->getColor() . '</td>';
                    echo '<td>' . $clothing->getType() . '</td>';
                    echo '<td>' . $clothing->getMaterialFee() . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>
