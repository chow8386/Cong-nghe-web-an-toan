<div id="center">
    <?php
        session_start();

        if (isset($_POST['upload'])) {
            $uploadDir = 'uploads/'; 
            
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
                echo "<h2>Danh sách file đã upload:</h2>";
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

        if (isset($_POST['reset'])){
            session_unset();
            session_destroy();
            header('Location: index.php?page=associateArr');
        }
    ?>
</div>