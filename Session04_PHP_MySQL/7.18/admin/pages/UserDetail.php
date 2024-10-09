<?php
    include '../libs/db_conn.php'; 

    $id = isset($_GET['id']) ? (int)$_GET['id'] : -1;

    if ($id < 0) {
        echo "Invalid user ID.";
        exit;
    }

    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "No user found with the given ID.";
        exit;
    }
    $stmt->close();
    include '../libs/db_close.php'; 
?>

<div id="center">
    <h2>User detail</h2>
    <div id="detail">
        <div class="avatar">
            <img src="<?php echo "uploads/" . $user['image']; ?>" alt="Avatar" width="150" height="150">
        </div>
        <div>
            <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
            <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
        </div>
    </div>
</div>
