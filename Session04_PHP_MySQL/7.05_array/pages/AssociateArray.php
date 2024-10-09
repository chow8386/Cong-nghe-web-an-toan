<div id="center">
    <h2>Sử dụng mảng kết hợp</h2>
    <p>Bài toán: Upload 10 file, in danh sách tên 10 file và đường dẫn download file</p>
    <form action="index.php?page=images" method="post" enctype="multipart/form-data">
        <?php
            for ($i = 0; $i < 10; $i++) {
                echo "<div class='file-upload'>";
                echo "File " . ($i + 1) . ": ";
                echo "<input type='file' name='fileToUpload[]'>";
                echo "</div>";
            }
        ?>
        <div>
            <button type="reset" name="reset">Reset</button>
            <button type="submit" name="upload">Upload</button>
        </div>
    </form>
</div>
