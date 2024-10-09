<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
        <li class="breadcrumb-item active">Favorite Web</li>
      </ol>
    </nav>
  </div>

<?php
    $favoriteLinks = [];
    $error_message = '';

    if (isset($_COOKIE['favorite_links'])) {
        $favoriteLinks = json_decode($_COOKIE['favorite_links'], true);
    }

    if (isset($_POST['add-link'])) {
        $newLink = $_POST['new_link'];
        
        if (!in_array($newLink, $favoriteLinks)) {
            $favoriteLinks[] = $newLink;
        } else {
            $error_message = 'Link already exists!';
        }

        setcookie('favorite_links', json_encode($favoriteLinks), time() + 2147483647, "/"); // Cookie tồn tại 30 ngày
    }
?>

  <section class="section dashboard">
    <div>
        <h5>Add a New Link</h5>
        <form method="POST" action="">
            <label>Enter URL: </label>
            <input type="url" name="new_link" required>
            <button type="submit" name="add-link">Add Link</button>
        </form>
        <span class="error-message"><?php echo $error_message; ?></span>
        <h5>Your Favorite Links</h5>
        <ul>
            <?php if (!empty($favoriteLinks)){ ?>
                <?php foreach ($favoriteLinks as $link){ ?>
                    <li><a href="<?php echo htmlspecialchars($link); ?>" target="_blank"><?php echo htmlspecialchars($link); ?></a></li>
                <?php } ?>
            <?php } else { ?>
                <li>No favorite links yet.</li>
            <?php } ?>
        </ul>

    </div>


