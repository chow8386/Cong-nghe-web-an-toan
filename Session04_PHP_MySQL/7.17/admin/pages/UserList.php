<?php
    include '../libs/db_conn.php';
    $users = [];

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = [
                'user_id' => $row['user_id'],
                'username' => $row['username'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'address' => $row['address'],
                'image' => $row['image']
            ];
        }
    }

    $_SESSION['users'] = $users;

    include '../libs/db_close.php'; 
?>

<div id="center">
    <h2>User List</h2>
    <form action="?page=userAdd" method="post">
        <button class="add" name="button-add-user" type="submit" >Add new user</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="font-edit">
            <?php if (!empty($users)) { ?>
                <?php for ($i = 0; $i < count($users); $i++) { ?>
                    <tr>
                        <td><?php echo ($i + 1); ?></td>
                        <td><?php echo htmlspecialchars($users[$i]['username']); ?></td>
                        <td>
                            <img src="uploads/<?php echo htmlspecialchars($users[$i]['image']); ?>" alt="Avatar" width="50" height="50">
                        </td> 
                        <td>
                            <a href="?page=userDetail&id=<?php echo $users[$i]['user_id']; ?>">Detail</a> 
                            <a href="?page=userEdit&id=<?php echo $users[$i]['user_id']; ?>" >Edit</a>
                            <a href="?page=userDelete&id=<?php echo $users[$i]['user_id']; ?>">Delete</a> 
                        </td>
                    </tr>
                <?php }} ?>
        </tbody>
    </table>
</div>
