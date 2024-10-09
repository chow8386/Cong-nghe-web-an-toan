<?php
    include '../libs/db_conn.php';
    $users = [];

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = [
                'category_id' => $row['category_id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'stock' => $row['stock']
            ];
        }
    }

    $_SESSION['categories'] = $categories;

    include '../libs/db_close.php'; 
?>

<div id="center">
    <h2>Category List</h2></h2>
    <form action="?page=categoryAdd" method="post">
        <button class="add" name="button-add-category" type="submit" >Add new category</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="font-edit">
            <?php if (!empty($categories)) { ?>
                <?php for ($i = 0; $i < count($categories); $i++) { ?>
                    <tr>
                        <td><?php echo ($i + 1); ?></td>
                        <td><?php echo htmlspecialchars($categories[$i]['name']); ?></td>
                        <td><?php echo htmlspecialchars($categories[$i]['description']); ?></td>
                        <td><?php echo htmlspecialchars($categories[$i]['stock']); ?></td>
                        <td>
                            <a href="?page=categoryEdit&id=<?php echo $categories[$i]['category_id']; ?>" >Edit</a>
                            <a href="?page=categoryDelete&id=<?php echo $categories[$i]['category_id']; ?>">Delete</a> 
                        </td>
                    </tr>
                <?php }} ?>
        </tbody>
    </table>
</div>
