<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
            <li class="breadcrumb-item active">Upload</li>
        </ol>
        </nav>
    </div>
    <?php 
        session_start();
        if (isset($_SESSION['username']) && (isset($_SESSION['password']))) 
        {
    ?>
  <section class="section dashboard">
    <form action="" method="post" enctype="multipart/form-data">
        <?php
            for ($i = 0; $i < 1; $i++) {
                echo "<div class='file-upload'>";
                echo "File " . ($i + 1) . ": ";
                echo "<input type='file' name='fileToUpload[]'>";
                echo "</div>";
            }
        ?>
        <div>
            <button type="reset" name="reset-upload-file">Reset</button>
            <button type="submit" name="upload">Upload</button>
        </div>
    </form>
    <?php 
    } else {
        echo "<p class='error-message'>Vui lòng đăng nhập!</p>";
    } 
    ?>

    <?php
        // session_start();

        if (isset($_POST['upload'])) {
            $uploadDir = '../uploads/'; 
            
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileNames = [];
            $filePaths = [];
            
            foreach ($_FILES['fileToUpload']['name'] as $index => $fileName) {
                if ($fileName != '') {
                    $filePath = $uploadDir . basename($fileName);

                    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$index], $filePath)) {
                        $fileNames[] = $fileName;
                        $filePaths[] = $filePath;
                    }
                }
            }

            $_SESSION['uploaded_files'] = [
                'names' => $fileNames,
                'paths' => $filePaths
            ];

            if (!empty($fileNames)) {
                echo "<h5>Danh sách file đã upload:</h5>";
                echo "<ul>";
                foreach ($fileNames as $index => $name) {
                    $path = $filePaths[$index];
                    echo "<li>Download file: <a href='$path' download='$name'>$name</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Không có file nào được upload.</p>";
            }
        }
    ?>