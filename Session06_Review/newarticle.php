<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$conn = new mysqli('localhost', 'root', '', 'QUANLY_NOIDUNG');

if ($conn->connect_error) {
    die("Loi ket noi csdl: " . $conn->connect_error);
}
//test
$_GET['author_id'] = 1;
$_GET['id'] = 1; 

$author_id = filter_var($_GET['author_id'], FILTER_VALIDATE_INT);
$article_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if (!$author_id || !$article_id) {
    die("Du lieu khong hop le");
}

$article = [];

if ($article_id) {
    $stmt = $conn->prepare("SELECT * FROM ARTICLE WHERE ID = ? AND AUTHORID = ?");
    $stmt->bind_param("ii", $article_id, $author_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $article = $result->fetch_assoc(); 
    } else {
        die("Khong co quyen truy cap");
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_name = htmlspecialchars($_POST['article_name']);
    $category_id = (int)htmlspecialchars($_POST['category_id']);
    $article_sum = htmlspecialchars($_POST['article_sum']);
    $content = htmlspecialchars($_POST['content']);
    $note = htmlspecialchars($_POST['note']);
    $day_modified = date('Y-m-d H:i:s'); 

    if (empty($article_name) || empty($category_id)  || empty($article_sum)  || empty($content) || empty($note)) {
        echo "Vui lòng nhập đầy đủ thông tin.";
    } else {
        $stmt = $conn->prepare("
            UPDATE ARTICLE 
            SET ARTICLENAME = ?, CATEGORYID = ?, ARTICLESUM = ?, CONTENT = ?, NOTE = ?, DAYMODIFIED = ?
            WHERE ID = ? AND AUTHORID = ?
        ");
        $stmt->bind_param("sissssii", $article_name, $category_id, $article_sum, $content, $note, $day_modified, $article_id, $author_id);

        if ($stmt->execute()) {
            echo "Successful!";
            header("Location: list.php");
            exit();
        } else {
            echo "Loi khi luu bai viet.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sua bai viet</title>
</head>
<body>
    <h1>Sua bai viet</h1>
    <form action="" method="post">
        <label for="article_name">Article name:</label>
        <input type="text" name="article_name" value="<?php echo htmlspecialchars($article['ARTICLENAME'] ?? ''); ?>" required>
        <br><br>

        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <option value="1" <?php echo isset($article) && $article['CATEGORYID'] == 1 ? 'selected' : ''; ?>>Chủ đề 1</option>
            <option value="2" <?php echo isset($article) && $article['CATEGORYID'] == 2 ? 'selected' : ''; ?>>Chủ đề 2</option>
        </select>
        <br><br>

        <label for="article_sum">Article sum:</label>
        <textarea name="article_sum"><?php echo htmlspecialchars($article['ARTICLESUM'] ?? ''); ?></textarea>
        <br><br>

        <label for="content">Content:</label>
        <textarea name="content" required><?php echo htmlspecialchars($article['CONTENT'] ?? ''); ?></textarea>
        <br><br>

        <label for="note">Note:</label>
        <textarea name="note"><?php echo htmlspecialchars($article['NOTE'] ?? ''); ?></textarea>
        <br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
