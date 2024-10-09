<?php
    include '../libs/db_conn.php';
    $products = [];

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = [
                'product_id' => $row['product_id'],
                'name' => $row['name'],
                'stock' => $row['stock'],
                'image' => $row['image_url'] 
            ];
        }
    }

    $_SESSION['products'] = $products;

    include '../libs/db_close.php'; 
?>

<div id="center">
    <h2>Product List</h2>
    <form action="?page=productAdd" method="post">
        <button class="add" name="button-add-product" type="submit">Add new product</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="font-edit">
            <?php if (!empty($products)) { ?>
                <?php for ($i = 0; $i < count($products); $i++) { ?>
                    <tr>
                        <td><?php echo ($i + 1); ?></td>
                        <td><?php echo htmlspecialchars($products[$i]['name']); ?></td>
                        <td>
                            <?php if (!empty($products[$i]['image'])) { ?>
                                <img src="../uploads/products/<?php echo htmlspecialchars($products[$i]['image']); ?>" alt="Product Image" style="width: 50px; height: 50px;">
                            <?php } else { ?>
                                No image
                            <?php } ?>
                        </td>
                        <td><?php echo htmlspecialchars($products[$i]['stock']); ?></td>
                        <td>
                            <a href="?page=productDetail&id=<?php echo $products[$i]['product_id']; ?>">Detail</a> 
                            <a href="?page=productEdit&id=<?php echo $products[$i]['product_id']; ?>">Edit</a> 
                            <a href="?page=productDelete&id=<?php echo $products[$i]['product_id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php }} ?>
        </tbody>
    </table>
</div>
